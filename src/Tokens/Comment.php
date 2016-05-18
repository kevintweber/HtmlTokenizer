<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;
use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class Comment extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false)
    {
        parent::__construct(Token::COMMENT, $parent, $throwOnError);

        $this->value = null;
    }

    public function parse($html)
    {
        $html = ltrim($html);

        // Get token position.
        $positionArray = HtmlTokenizer::getPosition($html);
        $this->setLine($positionArray['line']);
        $this->setPosition($positionArray['position']);

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
            'type' => 'comment',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
