<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

/**
 * A TokenCollection is a group of tokens designed to act similiar to
 * an array.
 */
class TokenCollection implements \ArrayAccess, \IteratorAggregate
{
    /** @var array[Token] */
    private $tokens;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tokens = array();
    }

    public function toArray()
    {
        $result = array();
        foreach ($this->tokens as $token) {
            $result[] = $token->toArray();
        }

        return $result;
    }

    public function reset()
    {
        return reset($this->tokens);
    }

    public function current()
    {
        return current($this->tokens);
    }

    public function end()
    {
        return end($this->tokens);
    }

    public function next()
    {
        return next($this->tokens);
    }

    public function prev()
    {
        return prev($this->tokens);
    }

    public function remove(Token $token)
    {
        $key = array_search($token, $this->tokens, true);
        if ($key === false) {
            return false;
        }

        unset($this->tokens[$key]);

        return true;
    }

    /**
     * Required by the ArrayAccess interface.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->tokens);
    }

    /**
     * Required by the ArrayAccess interface.
     */
    public function offsetGet($offset)
    {
        return $this->tokens[$offset];
    }

    /**
     * Required by the ArrayAccess interface.
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof Token) {
            throw new \InvalidArgumentException('Value must be of type Token.');
        }

        $this->tokens[$offset] = $value;
    }

    /**
     * Required by the ArrayAccess interface.
     */
    public function offsetUnset($offset)
    {
        unset($this->tokens[$offset]);
    }

    public function count()
    {
        return count($this->tokens);
    }

    public function isEmpty()
    {
        return empty($this->tokens);
    }

    /**
     * Required by the IteratorAggregate interface.
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->tokens);
    }
}
