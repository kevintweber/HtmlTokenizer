<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

interface Token
{
    const ATTRIBUTE = 'attribute';
    const CDATA     = 'cdata';
    const COMMENT   = 'comment';
    const DOCTYPE   = 'doctype';
    const ELEMENT   = 'element';
    const TEXT      = 'text';

    public function isClosingElementImplied($html);
    public static function isMatch($html);
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

    public function isAttribute();
    public function isCDATA();
    public function isComment();
    public function isDocType();
    public function isElement();
    public function isText();

    /**
     * Will convert this token to an array structure.
     *
     * @return array
     */
    public function toArray();
}
