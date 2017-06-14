<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;

class Text extends AbstractToken
{
    public function __construct(Token $parent = null, bool $throwOnError = true, string $forcedValue = '')
    {
        parent::__construct(Token::TEXT, $parent, $throwOnError);

        $this->value = $forcedValue;
        if ($forcedValue !== '') {
            $positionArray = HtmlTokenizer::getPosition($forcedValue);
            $this->line = $positionArray['line'];
            $this->position = $positionArray['position'];
        }
    }

    public function parse(string $html) : string
    {
        // Get token position.
        $positionArray = HtmlTokenizer::getPosition($html);
        $this->line = $positionArray['line'];
        $this->position = $positionArray['position'];

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
        if (trim($text) === '') {
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

    public function toArray() : array
    {
        return array(
            'type' => 'text',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
