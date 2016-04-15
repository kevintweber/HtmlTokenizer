<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Execptions\TokenMatchingException;

class TokenFactory
{
    public static function buildFromHtml($html, Token $parent = null, $throwOnError = false)
    {
        if (Text::isMatch($html)) {
            return new Text($parent, $throwOnError);
        }

        if (Element::isMatch($html)) {
            return new Element($parent, $throwOnError);
        }

        if (Comment::isMatch($html)) {
            return new Comment($parent, $throwOnError);
        }

        if (CData::isMatch($html)) {
            return new CData($parent, $throwOnError);
        }

        if (DocType::isMatch($html)) {
            return new DocType($parent, $throwOnError);
        }

        // Error condition
        if ($throwOnError) {
            throw new TokenMatchingException();
        }

        return false;
    }
}
