<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;
use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class CData extends AbstractToken
{
    public function __construct(Token $parent = null, bool $throwOnError = true)
    {
        parent::__construct(Token::CDATA, $parent, $throwOnError);
    }

    public function parse(string $html) : string
    {
        $html = ltrim($html);

        // Get token position.
        $positionArray = HtmlTokenizer::getPosition($html);
        $this->line = $positionArray['line'];
        $this->position = $positionArray['position'];

        // Parse token.
        $posOfEndOfCData = mb_strpos($html, ']]>');
        if ($posOfEndOfCData === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid CDATA.');
            }

            return '';
        }

        $this->value = trim(mb_substr($html, 9, $posOfEndOfCData - 9));

        return mb_substr($html, $posOfEndOfCData + 3);
    }

    public function toArray() : array
    {
        return array(
            'type' => 'cdata',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
