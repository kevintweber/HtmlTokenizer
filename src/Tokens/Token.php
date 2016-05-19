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
    public function getDepth();

    /**
     * Will return the token line number.
     *
     * @return int
     */
    public function getLine();

    /**
     * Will return the token line position.
     *
     * @return int
     */
    public function getPosition();

    /**
     * Will return true of the parent should be closed automatically.
     *
     * @param string $html
     *
     * @return boolean
     */
    public function isClosingElementImplied($html);

    /**
     * Will parse this token.
     *
     * @param string $html
     *
     * @return string Remaining HTML.
     */
    public function parse($html);

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
    public function getType();

    public function isCDATA();
    public function isComment();
    public function isDocType();
    public function isElement();
    public function isPhp();
    public function isText();

    /**
     * Will convert this token to an array structure.
     *
     * @return array
     */
    public function toArray();
}
