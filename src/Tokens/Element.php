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

    public static function isMatch($html)
    {
        return preg_match("/^<[a-zA-Z]/", $html) === 1;
    }

    public function parse($html)
    {
        // First we will try to find the name of the element.
        // This is actually a bit tough.

        // Find the position of the first '>' character.
        // If we take substrings of this position, we will get:
        //  * Open elements:   <elem></elem>           => <elem>
        //  * Closed elements: <elem/>                 => <elem/>
        //  * With attributes: <elem attr="1"></elem>  => <elem attr="1">
        //  * Special attr:    <elem attr=">"></elem>  => <elem attr=">
        $posOfFirstClosingBracket = strpos($html, '>');
        if ($posOfFirstClosingBracket === false) {
            if ($this->getThrowOnError()) {
                throw new ParseException('Invalid element: Element tag not closed.');
            }

            return '';
        }

        // Find the first space.
        // This only gives a value less than the first '>' character if
        // attributes are present.
        $posOfFirstSpace = strpos($html, ' ');
        $posOfFirstMarker = $posOfFirstClosingBracket;
        if ($posOfFirstSpace > 0) {
            $posOfFirstMarker = min($posOfFirstSpace, $posOfFirstClosingBracket);
        }

        // If we take substrings of the first marker, we will get:
        //  * Open elements:   <elem></elem>           => <elem>
        //  * Closed elements: <elem/>                 => <elem/>
        //  * With attributes: <elem attr="1"></elem>  => <elem
        //  * Special attr:    <elem attr=">"></elem>  => <elem
        $this->name = trim(substr($html, 1, $posOfFirstMarker - 1), "\/>");

        // Parse attributes.
        $remainingHtml = trim(substr($html, strlen($this->name) + 1));
        while (!($remainingHtml[0] == '>' || substr($remainingHtml, 0, 2) == '/>')) {
            $remainingHtml = trim($this->parseAttribute($remainingHtml));
        }

        return $remainingHtml;
    }

    private function parseAttribute($html)
    {
        // As above, we must find the first occurance of the end of the tag or
        // a space.
        $posOfFirstClosingBracket = strpos($html, '>');
        $posOfFirstSpace = strpos($html, ' ');
        $posOfFirstMarker = $posOfFirstClosingBracket;
        if ($posOfFirstSpace > 0) {
            $posOfFirstMarker = min($posOfFirstSpace, $posOfFirstClosingBracket);
        }

        // Full attribute text.
        $attribute = trim(substr($html, 0, $posOfFirstMarker), "\/>");

        // Find equals sign to determine if attribute uses empty syntax.
        $posOfEqualsSign = strpos($attribute, '=');

        /// @todo

        return trim(substr($html, strlen($attribute)));
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

        return $result;
    }
}
