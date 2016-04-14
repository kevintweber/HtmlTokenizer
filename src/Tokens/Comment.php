<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

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

    public static function isMatch($html)
    {
        return preg_match("/^<!--/", $html) === 1;
    }

    public function parse($html)
    {
        $posOfEndOfComment = strpos($html, '-->');
        if ($posOfEndOfComment === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid comment.');
            }

            return '';
        }

        $this->value = trim(substr($html, 4, $posOfEndOfComment - 4));

        return trim(substr($html, $posOfEndOfComment + 3));
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
            'value' => $this->value
        );
    }
}

