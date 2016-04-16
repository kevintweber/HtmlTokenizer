<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class Element extends AbstractToken
{
    /** @var array[Token] */
    private $attributes;

    /** @var array[Token] */
    private $children;

    /** @var string */
    private $name;

    public function __construct(Token $parent = null, $throwOnError = false)
    {
        parent::__construct(Token::ELEMENT, $parent, $throwOnError);

        $this->attributes = array();
        $this->children = array();
        $this->name = null;
    }

    public function isClosingElementImplied($html)
    {
        $parent = $this->getParent();
        if ($parent === null || !($parent instanceof self)) {
            return false;
        }

        $name = $this->parseElementName($html);
        $parentName = $parent->getName();

        // HEAD: no closing tag.
        if ($name === 'body' && $parentName === 'head') {
            return true;
        }

        // Closed-only elements.
        // Closing tags not required.  We will close them now.
        switch ($parentName) {
        case 'base':
        case 'link':
        case 'meta':
        case 'hr':
        case 'br':
            return true;
        }

        // P
        if ($parentName === 'p') {
            switch ($name) {
            case 'address':
            case 'article':
            case 'aside':
            case 'blockquote':
            case 'details':
            case 'div':
            case 'dl':
            case 'fieldset':
            case 'figcaption':
            case 'figure':
            case 'footer':
            case 'form':
            case 'h1':
            case 'h2':
            case 'h3':
            case 'h4':
            case 'h5':
            case 'h6':
            case 'header':
            case 'hgroup':
            case 'hr':
            case 'main':
            case 'menu':
            case 'nav':
            case 'ol':
            case 'p':
            case 'pre':
            case 'section':
            case 'table':
            case 'ul':
                return true;
            }
        }

        // LI
        if ($parentName == 'li' && $name == 'li') {
            return true;
        }

        // DT and DD
        if (($parentName == 'dt' || $parentName == 'dd') && ($name == 'dt' || $name == 'dd')) {
            return true;
        }

        // RP and RT
        if (($parentName == 'rp' || $parentName == 'rt') && ($name == 'rp' || $name == 'rt')) {
            return true;
        }

        return false;
    }

    public static function isMatch($html)
    {
        return preg_match("/^<[a-zA-Z]/", $html) === 1;
    }

    public function parse($html)
    {
        $this->name = $this->parseElementName($html);

        // Parse attributes.
        $remainingHtml = substr($html, strlen($this->name) + 1);
        while (strpos($remainingHtml, '>') !== false && preg_match("/^\s*[\/]?>/", $remainingHtml) === 0) {
            $remainingHtml = $this->parseAttribute($remainingHtml);
        }

        // Find position of end of tag.
        $posOfClosingBracket = strpos($remainingHtml, '>');
        if ($posOfClosingBracket === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid element: missing closing bracket.');
            }

            return '';
        }

        // Is self-closing?
        $posOfSelfClosingBracket = strpos($remainingHtml, '/>');
        $remainingHtml = trim(substr($remainingHtml, $posOfClosingBracket + 1));
        if ($posOfSelfClosingBracket !== false && $posOfSelfClosingBracket == $posOfClosingBracket - 1) {
            // Self-closing element.
            return $remainingHtml;
        }

        // Open element.
        return $this->parseContents($remainingHtml);
    }

    private function parseAttribute($html)
    {
        // Will match the first entire name/value attribute pair.
        $attrMatchSuccessful = preg_match(
            "/(\s*([^>\s]*))/",
            $html,
            $attributeMatches
        );
        if ($attrMatchSuccessful !== 1) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid attribute.');
            }

            return '';
        }

        $posOfEqualsSign = strpos($attributeMatches[2], '=');
        if ($posOfEqualsSign === false) {
            // Valueless attribute.
            $this->attributes[trim($attributeMatches[2])] = true;
        } else {
            list($name, $value) = explode('=', $attributeMatches[2]);
            if ($value[0] === "'" || $value[0] === '"') {
                $valueMatchSuccessful = preg_match(
                    "/" . $value[0] . "(.*?(?<!\\\))" . $value[0] . "/s",
                    $value,
                    $valueMatches
                );
                if ($valueMatchSuccessful !== 1) {
                    if ($this->getThrowOnError()) {
                        throw new ParseException('Invalid value encapsulation.');
                    }

                    return '';
                }

                $value = $valueMatches[1];
            }

            $this->attributes[trim($name)] = trim($value);
        }

        // Return the html minus the current attribute.
        $posOfAttribute = strpos($html, $attributeMatches[2]);

        return substr($html, $posOfAttribute + strlen($attributeMatches[2]));
    }

    private function parseContents($html)
    {
        $remainingHtml = trim($html);
        if ($remainingHtml == '') {
            return '';
        }

        // Parse contents one token at a time.
        while (preg_match("/^<\/\s*" . $this->name . "\s*>/is", $remainingHtml) === 0) {
            $token = TokenFactory::buildFromHtml(
                $remainingHtml,
                $this,
                $this->getThrowOnError()
            );

            if ($token === false || $token->isClosingElementImplied($remainingHtml)) {
                return $remainingHtml;
            }

            $remainingHtml = trim($token->parse($remainingHtml));
            $this->children[] = $token;
        }

        // Remove remaining closing tag.
        $posOfClosingBracket = strpos($remainingHtml, '>');

        return substr($remainingHtml, $posOfClosingBracket + 1);
    }

    /**
     * Will get the element name from the html string.
     *
     * @param $html string
     *
     * @return string The element name.
     */
    private function parseElementName($html)
    {
        $elementMatchSuccessful = preg_match(
            "/^(<(([a-z0-9\-]+:)?[a-z0-9\-]+))/i",
            $html,
            $elementMatches
        );
        if ($elementMatchSuccessful !== 1) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid element name.');
            }

            return '';
        }

        return strtolower($elementMatches[2]);
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function hasAttributes()
    {
        return !empty($this->attributes);
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function hasChildren()
    {
        return !empty($this->children);
    }

    /**
     * Getter for 'name'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function toArray()
    {
        $result = array(
            'type' => 'element',
            'name' => $this->name
        );

        if (!empty($this->attributes)) {
            $result['attributes'] = array();
            foreach ($this->attributes as $name => $value) {
                $result['attributes'][$name] = $value;
            }
        }

        if (!empty($this->children)) {
            $result['children'] = array();
            foreach ($this->children as $child) {
                $result['children'][] = $child->toArray();
            }
        }

        return $result;
    }
}
