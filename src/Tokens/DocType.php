<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class DocType extends AbstractToken
{
    public function __construct(Token $parent = null, bool $throwOnError = true)
    {
        parent::__construct(Token::DOCTYPE, $parent, $throwOnError);
    }

    public function parse(string $html) : string
    {
        $html = ltrim($html);
        $this->setTokenPosition($html);

        // Parse token.
        $posOfEndOfDocType = mb_strpos($html, '>');
        if ($posOfEndOfDocType === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid DOCTYPE.');
            }

            return '';
        }

        $this->value = trim(mb_substr($html, 10, $posOfEndOfDocType - 10));

        return mb_substr($html, $posOfEndOfDocType + 1);
    }

    public function toArray() : array
    {
        return array(
            'type' => 'doctype',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
