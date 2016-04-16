<?php

namespace Kevintweber\HtmlTokenizer;

use Kevintweber\HtmlTokenizer\Tokens\TokenCollection;
use Kevintweber\HtmlTokenizer\Tokens\TokenFactory;

class HtmlTokenizer
{
    /** @var boolean */
    private $throwOnError;

    /**
     * Constructor
     */
    public function __construct($throwOnError = false)
    {
        $this->throwOnError = (boolean) $throwOnError;
    }

    /**
     * Will parse html into tokens.
     *
     * @param $html string The HTML to tokenize.
     *
     * @return TokenCollection
     */
    public function parse($html)
    {
        $tokens = new TokenCollection();
        $remainingHtml = trim((string) $html);
        while (strlen($remainingHtml) > 0) {
            $token = TokenFactory::buildFromHtml(
                $remainingHtml,
                null,
                $this->throwOnError
            );
            if ($token === false) {
                // Error has occurred, so we stop.
                break;
            }

            $remainingHtml = trim($token->parse($remainingHtml));
            $tokens[] = $token;
        }

        return $tokens;
    }
}
