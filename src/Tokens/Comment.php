<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class Comment extends AbstractToken
{
    public function __construct(Token $parent = null, bool $throwOnError = true)
    {
        parent::__construct(Token::COMMENT, $parent, $throwOnError);
    }

    public function parse(string $html) : string
    {
        $html = ltrim($html);
        $this->setTokenPosition($html);

        // Parse token.
        $posOfEndOfComment = mb_strpos($html, '-->');
        if ($posOfEndOfComment === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid comment.');
            }

            return '';
        }

        $this->value = trim(mb_substr($html, 4, $posOfEndOfComment - 4));

        return mb_substr($html, $posOfEndOfComment + 3);
    }

    public function toArray() : array
    {
        return array(
            'type' => 'comment',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
