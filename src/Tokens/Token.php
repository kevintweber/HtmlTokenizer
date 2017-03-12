<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

interface Token
{
    const CDATA     = 'cdata';
    const COMMENT   = 'comment';
    const DOCTYPE   = 'doctype';
    const ELEMENT   = 'element';
    const PHP       = 'php';
    const TEXT      = 'text';

    /**
     * Will return the nesting depth of the token.
     *
     * @return int
     */
    public function getDepth() : int;

    /**
     * Will return the token line number.
     *
     * @return int
     */
    public function getLine() : int;

    /**
     * Will return the token line position.
     *
     * @return int
     */
    public function getPosition() : int;

    /**
     * Will return true of the parent should be closed automatically.
     *
     * @param string $html
     *
     * @return boolean
     */
    public function isClosingElementImplied(string $html) : bool;

    /**
     * Will parse this token.
     *
     * @param string $html
     *
     * @return string Remaining HTML.
     */
    public function parse(string $html) : string;

    /**
     * Will return the parent token or null if none.
     *
     * @return Token|null
     */
    public function getParent();

    /**
     * Will return the type of token.
     *
     * @return string
     */
    public function getType() : string;

    /**
     * Will return the contents of the token.
     *
     * @return string
     */
    public function getValue() : string;

    public function isCDATA() : bool;
    public function isComment() : bool;
    public function isDocType() : bool;
    public function isElement() : bool;
    public function isPhp() : bool;
    public function isText() : bool;

    /**
     * Will convert this token to an array structure.
     *
     * @return array
     */
    public function toArray() : array;
}
