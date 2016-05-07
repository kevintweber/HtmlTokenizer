<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

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
        $startPos = 3;
        if (mb_substr($html, 0, 5) == '<?php') {
            $startPos = 6;
        }

        $posOfEndOfPhp = mb_strpos($html, '?>');
        if ($posOfEndOfPhp === false) {
            $this->value = trim(mb_substr($html, $startPos));

            return '';
        }

        $this->value = trim(mb_substr($html, $startPos, $posOfEndOfPhp - 3));

        return trim(mb_substr($html, $posOfEndOfPhp + 2));
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
