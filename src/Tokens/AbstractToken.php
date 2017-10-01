<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;

abstract class AbstractToken implements Token
{
    /** @var int */
    private $depth;

    /** @var int */
    protected $line;

    /** @var null|Token */
    private $parent;

    /** @var int */
    protected $position;

    /** @var boolean */
    private $throwOnError;

    /** @var string */
    private $type;

    /** @var string */
    protected $value;

    /**
     * Constructor
     *
     * @param string     $type
     * @param Token|null $parent
     * @param bool       $throwOnError
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $type, Token $parent = null, bool $throwOnError = false)
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
        $this->throwOnError = $throwOnError;
        $this->type = $type;
        $this->value = '';
    }

    public function getDepth() : int
    {
        return $this->depth;
    }

    /**
     * Getter for 'line'.
     */
    public function getLine() : int
    {
        return $this->line;
    }

    public function isClosingElementImplied(string $html) : bool
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
    public function getPosition() : int
    {
        return $this->position;
    }

    /**
     * Getter for 'throwOnError'.
     *
     * @return boolean
     */
    protected function getThrowOnError() : bool
    {
        return $this->throwOnError;
    }

    /**
     * Getter for 'type'.
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * Getter for "value"
     *
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }

    public function isCDATA() : bool
    {
        return $this->type === Token::CDATA;
    }

    public function isComment() : bool
    {
        return $this->type === Token::COMMENT;
    }

    public function isDocType() : bool
    {
        return $this->type === Token::DOCTYPE;
    }

    public function isElement() : bool
    {
        return $this->type === Token::ELEMENT;
    }

    public function isPhp() : bool
    {
        return $this->type === Token::PHP;
    }

    public function isText() : bool
    {
        return $this->type === Token::TEXT;
    }

    protected function isValidType(string $type) : bool
    {
        return $type === Token::CDATA
            || $type === Token::COMMENT
            || $type === Token::DOCTYPE
            || $type === Token::ELEMENT
            || $type === Token::PHP
            || $type === Token::TEXT;
    }

    protected function setTokenPosition(string $html)
    {
        $positionArray = HtmlTokenizer::getPosition($html);
        $this->line = $positionArray['line'];
        $this->position = $positionArray['position'];
    }
}
