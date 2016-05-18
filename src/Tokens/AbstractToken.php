<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

abstract class AbstractToken implements Token
{
    /** @var int */
    private $depth;

    /** @var int */
    private $line;

    /** @var null|Token */
    private $parent;

    /** @var int */
    private $position;

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

        $this->depth = 0;
        if ($parent instanceof Token) {
            $this->depth = $parent->getDepth() + 1;
        }

        $this->line = 0;
        $this->position = 0;
        $this->parent = $parent;
        $this->throwOnError = (boolean) $throwOnError;
        $this->type = $type;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Getter for 'line'.
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Chainable setter for 'line'.
     */
    public function setLine($line)
    {
        $this->line = (int) $line;

        return $this;
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
     * Getter for 'position'.
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Chainable setter for 'position'.
     */
    public function setPosition($position)
    {
        $this->position = (int) $position;

        return $this;
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

    public function isPhp()
    {
        return $this->type === Token::PHP;
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
            || $type === Token::PHP
            || $type === Token::TEXT;
    }
}
