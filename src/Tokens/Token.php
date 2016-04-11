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

    public function getType();
    public function getValue();
    public function getAttributes();

    public function getChildren();
    public function hasChildren();

    public function isAttribute();
    public function isCDATA();
    public function isComment();
    public function isDocType();
    public function isElement();
    public function isText();
}
