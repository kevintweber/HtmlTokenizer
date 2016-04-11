<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

abstract class AbstractToken implements Token
{
    /** @var array[Token] */
    private $attributes;

    /** @var array[Token] */
    private $children;

    /** @var string */
    private $type;

    /** @var null|string */
    private $value;

    /**
     * Constructor
     */
    public function __construct($type)
    {
        if (!$this->isValidType($type)) {
            throw new \InvalidArgumentException('Invalid type: ' . $type);
        }

        $this->attributes = array();
        $this->children = array();
        $this->type = $type;
        $this->value = null;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Value must be a string.');
        }

        $this->value = $value;

        return $this;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function addChild(Token $token)
    {
        if ($token->getType() === Token::ATTRIBUTE) {
            $this->attributes[] = $token;

            return $this;
        }

        $this->children[] = $token;

        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function hasChildren()
    {
        return !empty($this->children);
    }

    public function isAttribute()
    {
        return $this->type === Token::ATTRIBUTE;
    }

    public function isCDATA()
    {
        return $this->type === Token::CDATA;
    }

    public function isComment()
    {
        return $this->type === Token::COMMENT;
    }

    public function isDocType()
    {
        return $this->type === Token::DOCTYPE;
    }

    public function isElement()
    {
        return $this->type === Token::ELEMENT;
    }

    public function isText()
    {
        return $this->type === Token::TEXT;
    }

    protected function isValidType($type)
    {
        return $type === Token::ATTRIBUTE
            || $type === Token::CDATA
            || $type === Token::COMMENT
            || $type === Token::DOCTYPE
            || $type === Token::ELEMENT
            || $type === Token::TEXT;
    }
}
