<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

class Text extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false, $forcedValue = null)
    {
        parent::__construct(Token::TEXT, $parent, $throwOnError);

        $this->value = $forcedValue;
    }

    public function parse($html)
    {
        // Collapse whitespace before TEXT.
        $startingWhitespace = '';
        if (preg_match("/(^\s)/", $html) === 1) {
            $startingWhitespace = ' ';
        }

        $posOfNextElement = mb_strpos($html, '<');
        if ($posOfNextElement === false) {
            $this->value = $startingWhitespace . trim($html);

            return '';
        }

        // Find full length of TEXT.
        $text = mb_substr($html, 0, $posOfNextElement);
        if (trim($text) == '') {
            $this->value = ' ';

            return mb_substr($html, $posOfNextElement);
        }

        // Collapse whitespace after TEXT.
        $endingWhitespace = '';
        if (preg_match("/(\s$)/", $text) === 1) {
            $endingWhitespace = ' ';
        }

        $this->value = $startingWhitespace . trim($text) . $endingWhitespace;

        return mb_substr($html, $posOfNextElement);
    }

    /**
     * Getter for 'value'.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function toArray()
    {
        return array(
            'type' => 'text',
            'value' => $this->value
        );
    }
}

