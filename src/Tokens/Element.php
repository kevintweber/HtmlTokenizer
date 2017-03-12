<?php

namespace Kevintweber\HtmlTokenizer\Tokens;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;
use Kevintweber\HtmlTokenizer\Exceptions\ParseException;

class Element extends AbstractToken
{
    /** @var array */
    private $attributes;

    /** @var array[Token] */
    private $children;

    /** @var string */
    private $name;

    public function __construct(Token $parent = null, bool $throwOnError = true)
    {
        parent::__construct(Token::ELEMENT, $parent, $throwOnError);

        $this->attributes = array();
        $this->children = array();
        $this->name = null;
    }

    /**
     * Does the parent have an implied closing tag?
     *
     * @param string $html
     *
     * @return boolean
     */
    public function isClosingElementImplied(string $html) : bool
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

        // P
        $elementsNotChildrenOfP = array(
            'address',
            'article',
            'aside',
            'blockquote',
            'details',
            'div',
            'dl',
            'fieldset',
            'figcaption',
            'figure',
            'footer',
            'form',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'header',
            'hgroup',
            'hr',
            'main',
            'menu',
            'nav',
            'ol',
            'p',
            'pre',
            'section',
            'table',
            'ul'
        );
        if ($parentName === 'p' && array_search($name, $elementsNotChildrenOfP) !== false) {
            return true;
        }

        // LI
        if ($parentName === 'li' && $name === 'li') {
            return true;
        }

        // DT and DD
        if (($parentName === 'dt' || $parentName === 'dd') && ($name === 'dt' || $name === 'dd')) {
            return true;
        }

        // RP and RT
        if (($parentName === 'rp' || $parentName === 'rt') && ($name === 'rp' || $name === 'rt')) {
            return true;
        }

        return false;
    }

    /**
     * Will parse this element.
     *
     * @param string $html
     *
     * @return string Remaining HTML.
     */
    public function parse(string $html) : string
    {
        $html = ltrim($html);

        // Get token position.
        $positionArray = HtmlTokenizer::getPosition($html);
        $this->line = $positionArray['line'];
        $this->position = $positionArray['position'];

        // Parse name.
        $this->name = $this->parseElementName($html);

        // Parse attributes.
        $remainingHtml = mb_substr($html, mb_strlen($this->name) + 1);
        while (mb_strpos($remainingHtml, '>') !== false && preg_match("/^\s*[\/]?>/", $remainingHtml) === 0) {
            $remainingHtml = $this->parseAttribute($remainingHtml);
        }

        // Find position of end of tag.
        $posOfClosingBracket = mb_strpos($remainingHtml, '>');
        if ($posOfClosingBracket === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid element: missing closing bracket.');
            }

            return '';
        }

        // Is self-closing?
        $posOfSelfClosingBracket = mb_strpos($remainingHtml, '/>');
        $remainingHtml = mb_substr($remainingHtml, $posOfClosingBracket + 1);
        if ($posOfSelfClosingBracket !== false && $posOfSelfClosingBracket == $posOfClosingBracket - 1) {
            // Self-closing element. (Note: $this->valuue is unchanged.)
            return $remainingHtml;
        }

        // Lets close those closed-only elements that are left open.
        $closedOnlyElements = array(
            'area',
            'base',
            'br',
            'col',
            'embed',
            'hr',
            'img',
            'input',
            'link',
            'meta',
            'param',
            'source',
            'track',
            'wbr'
        );
        if (array_search($this->name, $closedOnlyElements) !== false) {
            return $remainingHtml;
        }

        // Open element.
        return $this->parseContents($remainingHtml);
    }

    /**
     * Will parse attributes.
     *
     * @param string $html
     *
     * @return string Remaining HTML.
     */
    private function parseAttribute(string $html) : string
    {
        $remainingHtml = ltrim($html);

        // Will match the first entire name/value attribute pair.
        preg_match(
            "/((([a-z0-9\-_]+:)?[a-z0-9\-_]+)(\s*=\s*)?)/i",
            $remainingHtml,
            $attributeMatches
        );

        $name = $attributeMatches[2];
        $remainingHtml = mb_substr(mb_strstr($remainingHtml, $name), mb_strlen($name));
        if (preg_match("/^\s*=\s*/", $remainingHtml) === 0) {
            // Valueless attribute.
            $this->attributes[trim($name)] = true;
        } else {
            $remainingHtml = ltrim($remainingHtml, ' =');
            if ($remainingHtml[0] === "'" || $remainingHtml[0] === '"') {
                // Quote enclosed attribute value.
                $valueMatchSuccessful = preg_match(
                    "/" . $remainingHtml[0] . "(.*?(?<!\\\))" . $remainingHtml[0] . "/s",
                    $remainingHtml,
                    $valueMatches
                );
                if ($valueMatchSuccessful !== 1) {
                    if ($this->getThrowOnError()) {
                        throw new ParseException('Invalid value encapsulation.');
                    }

                    return '';
                }

                $value = $valueMatches[1];
            } else {
                // No quotes enclosing the attribute value.
                preg_match("/(\s*([^>\s]*(?<!\/)))/", $remainingHtml, $valueMatches);
                $value = $valueMatches[2];
            }

            $this->attributes[trim($name)] = $value;

            // Determine remaining html.
            if ($value == '') {
                $remainingHtml = ltrim(mb_substr(ltrim($html), mb_strlen($name) + 3));
            } else {
                $remainingHtml = ltrim($html);

                // Remove attribute name.
                $remainingHtml = mb_substr($remainingHtml, mb_strlen($name));
                $posOfAttributeValue = mb_strpos($remainingHtml, $value);
                $remainingHtml = ltrim(
                    mb_substr(
                        $remainingHtml,
                        $posOfAttributeValue + mb_strlen($value)
                    )
                );
            }

            $remainingHtml = ltrim($remainingHtml, '\'"/ ');
        }

        return $remainingHtml;
    }

    /**
     * Will parse the contents of this element.
     *
     * @param string $html
     *
     * @return string Remaining HTML.
     */
    private function parseContents(string $html) : string
    {
        if (trim($html) == '') {
            return '';
        }

        // Determine value.
        $this->value = $html;
        if (preg_match("/(.*)<\/\s*" . $this->name . "\s*>/iU", $html, $valueMatches) === 1) {
            $this->value = $valueMatches[1];
        }

        // Don't parse contents of "iframe" element.
        if ($this->name === 'iframe') {
            return $this->parseNoContents('iframe', $html);
        }

        // Only TEXT inside a "script" element.
        if ($this->name === 'script') {
            return $this->parseForeignContents('script', $html);
        }

        // Only TEXT inside a "style" element.
        if ($this->name === 'style') {
            return $this->parseForeignContents('style', $html);
        }

        // Parse contents one token at a time.
        $remainingHtml = $html;
        while (preg_match("/^<\/\s*" . $this->name . "\s*>/is", $remainingHtml) === 0) {
            $token = TokenFactory::buildFromHtml(
                $remainingHtml,
                $this,
                $this->getThrowOnError()
            );

            if (!$token instanceof Token || $token->isClosingElementImplied($remainingHtml)) {
                return $remainingHtml;
            }

            $remainingHtml = $token->parse($remainingHtml);
            $this->children[] = $token;
        }

        // Remove last token if contains only whitespace.
        if (!empty($this->children)) {
            $lastChildArray = array_slice($this->children, -1);
            $lastChild = array_pop($lastChildArray);
            if ($lastChild->isText() && trim($lastChild->getValue()) == '') {
                array_pop($this->children);
            }
        }

        // Remove remaining closing tag.
        $posOfClosingBracket = mb_strpos($remainingHtml, '>');

        return mb_substr($remainingHtml, $posOfClosingBracket + 1);
    }

    /**
     * Will get the element name from the html string.
     *
     * @param $html string
     *
     * @return string The element name.
     */
    private function parseElementName(string $html) : string
    {
        $html = trim($html);
        $elementMatchSuccessful = preg_match(
            "/^(<(([a-z0-9\-]+:)?[a-z0-9\-]+))/i",
            $html,
            $elementMatches
        );
        if ($elementMatchSuccessful !== 1) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid element name. Truncated html = ' . mb_substr($html, 0, 20));
            }

            return '';
        }

        return mb_strtolower($elementMatches[2]);
    }

    /**
     * Will parse the script and style contents correctly.
     *
     * @param $tag  string
     * @param $html string
     *
     * @return string The remaining HTML.
     */
    private function parseForeignContents(string $tag, string $html) : string
    {
        $remainingHtml = ltrim($html);

        // Get token position.
        $positionArray = HtmlTokenizer::getPosition($remainingHtml);

        // Find all contents.
        $matchingResult = preg_match(
            "/(<\/\s*" . $tag . "\s*>)/i",
            $html,
            $endOfScriptMatches
        );
        if ($matchingResult === 0) {
            $this->value = trim($remainingHtml);
            $remainingHtml = '';
        } else {
            $closingTag = $endOfScriptMatches[1];
            $this->value = trim(
                mb_substr($remainingHtml, 0, mb_strpos($remainingHtml, $closingTag))
            );
            $remainingHtml = mb_substr(
                mb_strstr($remainingHtml, $closingTag),
                mb_strlen($closingTag)
            );
        }

        // Handle no contents.
        if ($this->value == '') {
            return $remainingHtml;
        }

        $text = new Text($this, $this->getThrowOnError(), $this->value);
        $this->children[] = $text;

        return $remainingHtml;
    }

    /**
     * Will not parse the contents of an element.
     *
     * "iframe" elements.
     *
     * @param $tag  string
     * @param $html string
     *
     * @return string The remaining HTML.
     */
    private function parseNoContents(string $tag, string $html) : string
    {
        $remainingHtml = ltrim($html);
        $matchingResult = preg_match(
            "/(<\/\s*" . $tag . "\s*>)/i",
            $html,
            $endOfScriptMatches
        );
        if ($matchingResult === 0) {
            return '';
        }

        $closingTag = $endOfScriptMatches[1];
        $this->value = mb_substr($remainingHtml, 0, mb_strpos($html, $closingTag));

        return mb_substr(
            mb_strstr($remainingHtml, $closingTag),
            mb_strlen($closingTag)
        );
    }

    /**
     * Getter for 'attributes'.
     *
     * @return array
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    /**
     * @return boolean
     */
    public function hasAttributes() : bool
    {
        return !empty($this->attributes);
    }

    /**
     * Getter for 'children'.
     *
     * @return array
     */
    public function getChildren() : array
    {
        return $this->children;
    }

    /**
     * @return boolean
     */
    public function hasChildren() : bool
    {
        return !empty($this->children);
    }

    /**
     * Getter for 'name'.
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    public function toArray() : array
    {
        $result = array(
            'type' => 'element',
            'name' => $this->name,
            'line' => $this->getLine(),
            'position' => $this->getPosition()
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
