<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class DocType extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false)
    {
        parent::__construct(Token::DOCTYPE, $parent, $throwOnError);

        $this->value = null;
    }

    public function isClosingElementImplied($html)
    {
        return false;
    }

    public static function isMatch($html)
    {
        return preg_match("/^<!DOCTYPE /i", $html) === 1;
    }

    public function parse($html)
    {
        $posOfEndOfDocType = strpos($html, '>');
        if ($posOfEndOfDocType === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid DOCTYPE.');
            }

            return '';
        }

        $this->value = trim(substr($html, 10, $posOfEndOfDocType - 10));

        return trim(substr($html, $posOfEndOfDocType + 1));
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
            'type' => 'doctype',
            'value' => $this->value
        );
    }
}

