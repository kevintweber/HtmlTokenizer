<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;
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

    public function parse($html)
    {
        $html = ltrim($html);

        // Get token position.
        $positionArray = HtmlTokenizer::getPosition($html);
        $this->setLine($positionArray['line']);
        $this->setPosition($positionArray['position']);

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
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
