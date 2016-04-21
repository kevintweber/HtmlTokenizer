<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

class Text extends AbstractToken
{
    /** @var string */
    private $value;

    public function __construct(Token $parent = null, $throwOnError = false, $forcedValue = null)
    {
        parent::__construct(Token::TEXT, $parent, $throwOnError);

        $this->value = $forcedValue;
    }

    public function parse($html)
    {
        $posOfNextElement = mb_strpos($html, '<');
        if ($posOfNextElement === false) {
            $this->value = $html;

            return '';
        }

        $this->value = trim(mb_substr($html, 0, $posOfNextElement));

        return mb_substr($html, $posOfNextElement);
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

