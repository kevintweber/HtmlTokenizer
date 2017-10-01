<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

class Php extends AbstractToken
{
    public function __construct(Token $parent = null, bool $throwOnError = true)
    {
        parent::__construct(Token::PHP, $parent, $throwOnError);
    }

    public function parse(string $html) : string
    {
        $html = ltrim($html);
        $this->setTokenPosition($html);

        // Parse token.
        $startPos = 3;
        if (mb_substr(mb_strtolower($html), 0, 5) === '<?php') {
            $startPos = 6;
        }

        $posOfEndOfPhp = mb_strpos($html, '?>');
        if ($posOfEndOfPhp === false) {
            $this->value = trim(mb_substr($html, $startPos));

            return '';
        }

        $this->value = trim(mb_substr($html, $startPos, $posOfEndOfPhp - $startPos - 1));

        return mb_substr($html, $posOfEndOfPhp + 2);
    }

    public function toArray() : array
    {
        return array(
            'type' => 'php',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
