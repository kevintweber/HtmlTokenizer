<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Execptions\TokenMatchingException;

class TokenFactory
{
    /** @var boolean */
    private $throwOnError;

    /**
     * Constructor
     */
    public function __construct($throwOnError)
    {
        $this->throwOnError = (boolean) $throwOnError;
    }

    public function buildFromHtml($html, Token $parent = null)
    {
        if (Text::isMatch($html)) {
            return new Text($parent, $this->throwOnError);
        }

        if (Element::isMatch($html)) {
            return new Element($parent, $this->throwOnError);
        }

        if (Comment::isMatch($html)) {
            return new Comment($parent, $this->throwOnError);
        }

        if (CData::isMatch($html)) {
            return new CData($parent, $this->throwOnError);
        }

        if (DocType::isMatch($html)) {
            return new DocType($parent, $this->throwOnError);
        }

        // Error condition
        if ($this->throwOnError) {
            throw new TokenMatchingException();
        }

        return false;
    }
}
