<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

abstract class AbstractToken implements Token
{
    /** @var null|Token */
    private $parent;

    /** @var boolean */
    private $throwOnError;

    /** @var string */
    private $type;

    /**
     * Constructor
     */
    public function __construct($type, Token $parent = null, $throwOnError = false)
    {
        if (!$this->isValidType($type)) {
            throw new \InvalidArgumentException('Invalid type: ' . $type);
        }

        $this->parent = $parent;
        $this->throwOnError = (boolean) $throwOnError;
        $this->type = $type;
    }

    public function isClosingElementImplied($html)
    {
        return false;
    }

    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Getter for 'throwOnError'.
     *
     * @return boolean
     */
    protected function getThrowOnError()
    {
        return $this->throwOnError;
    }

    /**
     * Getter for 'type'.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
        return $type === Token::CDATA
            || $type === Token::COMMENT
            || $type === Token::DOCTYPE
            || $type === Token::ELEMENT
            || $type === Token::TEXT;
    }
}
