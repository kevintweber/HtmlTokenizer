<?php

namespace Kevintweber\HtmlTokenizer;

use Kevintweber\HtmlTokenizer\Tokens\Token;
use Kevintweber\HtmlTokenizer\Tokens\TokenCollection;
use Kevintweber\HtmlTokenizer\Tokens\TokenFactory;

class HtmlTokenizer
{
    /** @var boolean */
    private $throwOnError;

    /** @var string */
    private static $allHtml = '';

    /**
     * Constructor
     */
    public function __construct(bool $throwOnError = true)
    {
        $this->throwOnError = $throwOnError;
    }

    /**
     * Will parse html into tokens.
     *
     * @param $html string The HTML to tokenize.
     *
     * @return TokenCollection
     */
    public function parse(string $html) : TokenCollection
    {
        self::$allHtml = $html;
        $tokens = new TokenCollection();
        $remainingHtml = trim((string) $html);
        while (mb_strlen($remainingHtml) > 0) {
            $token = TokenFactory::buildFromHtml(
                $remainingHtml,
                null,
                $this->throwOnError
            );
            if (!$token instanceof Token) {
                // Error has occurred, so we stop.
                break;
            }

            $remainingHtml = $token->parse($remainingHtml);
            $tokens[] = $token;
        }

        return $tokens;
    }

    public static function getPosition(string $partialHtml) : array
    {
        $position = mb_strrpos(self::$allHtml, $partialHtml);
        $parsedHtml = mb_substr(self::$allHtml, 0, $position);
        $line = mb_substr_count($parsedHtml, "\n");
        if ($line === 0) {
            return array(
                'line' => 0,
                'position' => $position
            );
        }

        $lastNewLinePosition = mb_strrpos($parsedHtml, "\n");

        return array(
            'line' => $line,
            'position' => mb_strlen(mb_substr($parsedHtml, $lastNewLinePosition))
        );
    }
}
