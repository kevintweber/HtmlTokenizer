<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

class Text extends AbstractToken
{
    /**
     * Constructor
     *
     * @param Token|null $parent        The parent Token
     * @param bool       $throwOnError
     * @param string     $forcedValue   For when contents could be parsed but will be interpreted as TEXT instead.
     *                                  When forcing a value, do not call parse.
     */
    public function __construct(Token $parent = null, bool $throwOnError = true, string $forcedValue = '')
    {
        parent::__construct(Token::TEXT, $parent, $throwOnError);

        $this->value = $forcedValue;
        if ($forcedValue !== '') {
            $this->setTokenPosition($forcedValue);
        }
    }

    public function parse(string $html) : string
    {
        $this->setTokenPosition($html);
        $startingWhitespace = $this->determineStartingWhitespace($html);

        $posOfNextElement = mb_strpos($html, '<');
        if ($posOfNextElement === false) {
            $this->value = $startingWhitespace . trim($html);

            return '';
        }

        // Find full length of TEXT.
        $text = mb_substr($html, 0, $posOfNextElement);
        if (trim($text) === '') {
            $this->value = ' ';

            return mb_substr($html, $posOfNextElement);
        }

        $endingWhitespace = $this->determineEndingWhitespace($text);
        $this->value = $startingWhitespace . trim($text) . $endingWhitespace;

        return mb_substr($html, $posOfNextElement);
    }

    public function toArray() : array
    {
        return array(
            'type' => 'text',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }

    /**
     * If whitespace exists at the start of the HTML, collapse it to a single space.
     *
     * @param string $html
     *
     * @return string
     */
    private function determineStartingWhitespace(string $html) : string
    {
        $startingWhitespace = '';
        if (preg_match("/(^\s)/", $html) === 1) {
            $startingWhitespace = ' ';
        }

        return $startingWhitespace;
    }

    /**
     * If whitespace exists at the end of the HTML, collapse it to a single space.
     *
     * @param string $text
     *
     * @return string
     */
    private function determineEndingWhitespace(string $text) : string
    {
        $endingWhitespace = '';
        if (preg_match("/(\s$)/", $text) === 1) {
            $endingWhitespace = ' ';
        }

        return $endingWhitespace;
    }
}
