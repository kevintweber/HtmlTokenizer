<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

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
            'value' => $this->value
        );
    }
}
