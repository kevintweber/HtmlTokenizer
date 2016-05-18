<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;

class Php extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false)
    {
        parent::__construct(Token::PHP, $parent, $throwOnError);

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
        $startPos = 3;
        if (mb_substr($html, 0, 5) == '<?php') {
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
            'type' => 'php',
            'value' => $this->value,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
        );
    }
}
