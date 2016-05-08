<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\TokenMatchingException;

class TokenFactory
{
    public static function buildFromHtml($html, Token $parent = null, $throwOnError = false)
    {
        $matchCriteria = array(
            'Php' => "/(^\s*<\?\s)|(^\s*<\?php\s)/i",
            'Comment' => "/^\s*<!--/",
            'CData' => "/^\s*<!\[CDATA\[/",
            'DocType' => "/^\s*<!DOCTYPE /i",
            'Element' => "/^\s*<[a-z]/i",
            'Text' => "/^[^<]/"
        );
        foreach ($matchCriteria as $className => $regex) {
            if (preg_match($regex, $html) === 1) {
                $fullClassName = "Kevintweber\\HtmlTokenizer\\Tokens\\" . $className;

                return new $fullClassName($parent, $throwOnError);
            }
        }

        // Error condition
        if ($throwOnError) {
            throw new TokenMatchingException();
        }

        return false;
    }
}
