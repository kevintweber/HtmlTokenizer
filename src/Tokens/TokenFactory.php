<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\TokenMatchingException;
use Prophecy\Argument\Token\TokenInterface;

class TokenFactory
{
    /**
     * Factory method to build the correct token.
     *
     * @param string     $html
     * @param Token|null $parent
     * @param bool       $throwOnError
     *
     * @return TokenInterface|null
     * @throws TokenMatchingException
     */
    public static function buildFromHtml(string $html, Token $parent = null, bool $throwOnError = true)
    {
        $matchCriteria = array(
            'Php' => "/^\s*<\?(php)?\s/i",
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
    }
}
