<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

class Text extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false)
    {
        parent::__construct(Token::TEXT, $parent, $throwOnError);

        $this->value = null;
    }

    public static function isMatch($html)
    {
        return preg_match("/^[^<]/", $html) === 1;
    }

    public function parse($html)
    {
        $posOfNextElement = strpos($html, '<');
        if ($posOfNextElement === false) {
            $this->value = $html;

            return '';
        }

        $this->value = trim(substr($html, 0, $posOfNextElement));

        return substr($html, $posOfNextElement);
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
            'type' => 'text',
            'value' => $this->value
        );
    }
}

