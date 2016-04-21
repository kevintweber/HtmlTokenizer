<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class CData extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false)
    {
        parent::__construct(Token::CDATA, $parent, $throwOnError);

        $this->value = null;
    }

    public function parse($html)
    {
        $posOfEndOfCData = mb_strpos($html, ']]>');
        if ($posOfEndOfCData === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid CDATA.');
            }

            return '';
        }

        $this->value = trim(mb_substr($html, 9, $posOfEndOfCData - 9));

        return trim(mb_substr($html, $posOfEndOfCData + 3));
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
            'type' => 'cdata',
            'value' => $this->value
        );
    }
}
