<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Element;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider isClosingElementImpliedDataProvider
     */
    public function testIsClosingElementImplied($html, $parent = null, $expectedResult = true)
    {
        $element = new Element($parent);
        $this->assertEquals($expectedResult, $element->isClosingElementImplied($html));
    }

    public function isClosingElementImpliedDataProvider()
    {
        return array(
            'no parent' => array(
                '<body>',
                null,
                false
            ),
            'head' => array(
                '<body>',
                $this->createElement('head'),
                true
            ),
            'p-address' => array(
                '<address>',
                $this->createElement('p'),
                true
            ),
            'p-article' => array(
                '<article>',
                $this->createElement('p'),
                true
            ),
            'p-div' => array(
                '<div>',
                $this->createElement('p'),
                true
            ),
            'p-b' => array(
                '<b>',
                $this->createElement('p'),
                false
            ),
            'li' => array(
                '<li>',
                $this->createElement('li'),
                true
            ),
            'dd-dd' => array(
                '<dd>',
                $this->createElement('dd'),
                true
            ),
            'dd-dt' => array(
                '<dd>',
                $this->createElement('dt'),
                true
            ),
            'dt-dd' => array(
                '<dt>',
                $this->createElement('dd'),
                true
            ),
            'dt-dt' => array(
                '<dt>',
                $this->createElement('dt'),
                true
            ),
            'rp-rp' => array(
                '<rp>',
                $this->createElement('rp'),
                true
            ),
            'rp-rt' => array(
                '<rp>',
                $this->createElement('rt'),
                true
            ),
            'rt-rp' => array(
                '<rt>',
                $this->createElement('rp'),
                true
            ),
            'rt-rt' => array(
                '<rt>',
                $this->createElement('rt'),
                true
            )
        );
    }

    private function createElement($tag)
    {
        $element = new Element();
        $element->parse('<' . $tag . '/>');

        return $element;
    }

    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, $expectedName, $expectedRemainingHtml)
    {
        $element = new Element();
        $remainingHtml = $element->parse($html);
        $this->assertEquals($expectedName, $element->getName(), 'Testing name.');
        $this->assertEquals($expectedRemainingHtml, $remainingHtml, 'Testing remaining HTML.');
    }

    public function parseDataProvider()
    {
        return array(
            'simple closed' => array(
                '<asdf/>',
                'asdf',
                ''
            ),
            'simple closed with whitespace' => array(
                '<asdf     />',
                'asdf',
                ''
            ),
            'closed with 1 attribute' => array(
                '<asdf foo="bar"/>',
                'asdf',
                ''
            ),
            'closed with empty attribute' => array(
                '<asdf foo/>',
                'asdf',
                ''
            ),
            'closed with pseudo-empty attribute' => array(
                '<asdf disabled="disabled"/>',
                'asdf',
                ''
            ),
            'closed with explicit empty attribute' => array(
                '<asdf foo=""/>',
                'asdf',
                ''
            ),
            'closed with 1 attr and whitespace' => array(
                '<asdf foo="bar" />',
                'asdf',
                ''
            ),
            'simple open' => array(
                '<asdf></asdf>',
                'asdf',
                ''
            ),
            'simple open with whitespace' => array(
                '<asdf    >foo</asdf>',
                'asdf',
                ''
            ),
            'open with 1 attribute' => array(
                '<asdf foo="bar">bat</asdf>',
                'asdf',
                ''
            ),
            'open with 1 attr and whitespace' => array(
                '<asdf foo="bar" >   bat    </asdf>',
                'asdf',
                ''
            ),
            'parse error' => array(
                '<asdf',
                'asdf',
                ''
            ),
            'php' => array(
                '<asdf><?php echo "asdf"; ?></asdf>',
                'asdf',
                ''
            ),
            'multibyte characters' => array(
                '<asdf>לֶף־בֵּית</asdf>',
                'asdf',
                ''
            )
        );
    }

    /**
     * @expectedException Kevintweber\HtmlTokenizer\Exceptions\ParseException
     */
    public function testExceptionInParse()
    {
        $element = new Element(null, true);
        $element->parse('<asdf');
    }

    /**
     * @expectedException Kevintweber\HtmlTokenizer\Exceptions\ParseException
     */
    public function testExceptionInParseElementName()
    {
        $element = new Element();
        $this->assertEquals('', $element->parse('<?php'));

        $element = new Element(null, true);
        $element->parse('<?php');
    }

    /**
     * @expectedException Kevintweber\HtmlTokenizer\Exceptions\ParseException
     */
    public function testExceptionInParseAttribute()
    {
        $element = new Element();
        $this->assertEquals('', $element->parse('<asdf foo=\'bar" />'));

        $element = new Element(null, true);
        $element->parse('<asdf foo=\'bar" />');
    }

    /**
     * @dataProvider toArrayDataProvider
     */
    public function testToArray($html, $expectedArray, $debug = false)
    {
        $element = new Element();
        $element->parse($html);
        if ($debug) {
            var_dump($html, $element->toArray());
        }

        $this->assertEquals($expectedArray, $element->toArray());
    }

    public function toArrayDataProvider()
    {
        return array(
            'simple closed' => array(
                '<asdf/>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0
                )
            ),
            'simple closed followed by text' => array(
                '<asdf/>asdfasdf',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0
                )
            ),
            'closed with valueless attribute' => array(
                '<asdf foo1 />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo1' => true
                    )
                )
            ),
            'closed with unquoted attribute' => array(
                '<asdf foo2=bar2 />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo2' => 'bar2'
                    )
                )
            ),
            'closed with single-quoted attribute' => array(
                '<asdf foo3=\'bar3\' />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo3' => 'bar3'
                    )
                )
            ),
            'closed with double-quoted attribute' => array(
                '<asdf foo4="bar4" />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo4' => 'bar4'
                    )
                )
            ),
            'closed with empty double-quoted attribute' => array(
                '<asdf foo4="" />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo4' => ''
                    )
                )
            ),
            'closed with 1 attribute containing equals sign' => array(
                '<asdf foo="bar=bar2" />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo' => 'bar=bar2'
                    )
                )
            ),
            'closed with pseudo-empty attribute' => array(
                '<asdf disabled="disabled"/>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'disabled' => 'disabled'
                    )
                )
            ),
            'closed with multiple attributes' => array(
                '<asdf     foo1="bar1"     foo2="bar2" foo3="bar3"      />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo1' => 'bar1',
                        'foo2' => 'bar2',
                        'foo3' => 'bar3'
                    )
                )
            ),
            'closed with all attributes' => array(
                '<asdf foo1 foo2=bar2 foo3=\'bar3\\\'bar3\' foo4="bar4\"bar4" />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo1' => true,
                        'foo2' => 'bar2',
                        'foo3' => 'bar3\\\'bar3',
                        'foo4' => 'bar4\\"bar4'
                    )
                )
            ),
            'closed with all attributes - reordered' => array(
                '<asdf foo4="bar4\"bar4" foo2=bar2 foo1 foo3=\'bar3\\\'bar3\' />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo4' => 'bar4\\"bar4',
                        'foo2' => 'bar2',
                        'foo1' => true,
                        'foo3' => 'bar3\\\'bar3'
                    )
                )
            ),
            'simple open' => array(
                '<asdf></asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0
                )
            ),
            'simple open with text content' => array(
                '<asdf>foo</asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'foo',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'open with text content and whitespace' => array(
                '<asdf foo="bar" >   foo-bar    </asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'foo' => 'bar'
                    ),
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => ' foo-bar ',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'link followed by conditional comment' => array(
                '<head><link href=../assets/css/docs.min.css rel=stylesheet><!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]--></head>',
                array(
                    'type' => 'element',
                    'name' => 'head',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'link',
                            'line' => 0,
                            'position' => 0,
                            'attributes' => array(
                                'href' => '../assets/css/docs.min.css',
                                'rel' => 'stylesheet'
                            )
                        ),
                        array(
                            'type' => 'comment',
                            'value' => '[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'link followed by whitespace and conditional comment' => array(
                '<head><link href=../assets/css/docs.min.css rel=stylesheet>    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->    </head>',
                array(
                    'type' => 'element',
                    'name' => 'head',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'link',
                            'line' => 0,
                            'position' => 0,
                            'attributes' => array(
                                'href' => '../assets/css/docs.min.css',
                                'rel' => 'stylesheet'
                            )
                        ),
                        array(
                            'type' => 'comment',
                            'value' => '[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'script tag' => array(
                '<script> asdf    </script>',
                array(
                    'type' => 'element',
                    'name' => 'script',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'asdf',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'script tag without end' => array(
                '<script> asdf  ',
                array(
                    'type' => 'element',
                    'name' => 'script',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'asdf',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'style tag' => array(
                '<style> body { color: green; }    </style>',
                array(
                    'type' => 'element',
                    'name' => 'style',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'body { color: green; }',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'style tag without end' => array(
                '<style> body { color: green; }  ',
                array(
                    'type' => 'element',
                    'name' => 'style',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'body { color: green; }',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'multibyte characters' => array(
                '<asdf>לֶף־בֵּית</asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'לֶף־בֵּית',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'iframe' => array(
                '<div><iframe><html><body>yo!</body></html></iframe></div>',
                array(
                    'type' => 'element',
                    'name' => 'div',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'iframe',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'malformed iframe' => array(
                '<div><iframe><html><body>yo!</body></html>',
                array(
                    'type' => 'element',
                    'name' => 'div',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'iframe',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'ol - varied children' => array(
                '<ol class="qwerty"><!-- <h1>bad</h1> --><li value=2>asdf1</li>asdf2<script><![CDATA[asdf]]></script><div>asdf3</div></ol>',
                array(
                    'type' => 'element',
                    'name' => 'ol',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'class' => 'qwerty'
                    ),
                    'children' => array(
                        array(
                            'type' => 'comment',
                            'value' => '<h1>bad</h1>',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'li',
                            'line' => 0,
                            'position' => 0,
                            'attributes' => array(
                                'value' => '2'
                            ),
                            'children' => array(
                                array(
                                    'type' => 'text',
                                    'value' => 'asdf1',
                                    'line' => 0,
                                    'position' => 0
                                )
                            ),
                        ),
                        array(
                            'type' => 'text',
                            'value' => 'asdf2',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'script',
                            'line' => 0,
                            'position' => 0,
                            'children' => array(
                                array(
                                    'type' => 'text',
                                    'value' => '<![CDATA[asdf]]>',
                                    'line' => 0,
                                    'position' => 0
                                )
                            )
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'div',
                            'line' => 0,
                            'position' => 0,
                            'children' => array(
                                array(
                                    'type' => 'text',
                                    'value' => 'asdf3',
                                    'line' => 0,
                                    'position' => 0
                                )
                            )
                        )
                    )
                )
            ),
            'form - malformed div in form' => array(
                '<form action="http://www.google.com/search" method="get"><label>Google: <input type="search" name="q"><div action="yo!" method="post"><input type="hidden" value="9"/></div></label><input type="submit" value="Search..."></form>',
                array(
                    'type' => 'element',
                    'name' => 'form',
                    'line' => 0,
                    'position' => 0,
                    'attributes' => array(
                        'action' => 'http://www.google.com/search',
                        'method' => 'get'
                    ),
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'label',
                            'line' => 0,
                            'position' => 0,
                            'children' => array(
                                array(
                                    'type' => 'text',
                                    'value' => 'Google: ',
                                    'line' => 0,
                                    'position' => 0
                                ),
                                array(
                                    'type' => 'element',
                                    'name' => 'input',
                                    'line' => 0,
                                    'position' => 0,
                                    'attributes' => array(
                                        'type' => 'search',
                                        'name' => 'q'
                                    )
                                ),
                                array(
                                    'type' => 'element',
                                    'name' => 'div',
                                    'line' => 0,
                                    'position' => 0,
                                    'attributes' => array(
                                        'action' => 'yo!',
                                        'method' => 'post'
                                    ),
                                    'children' => array(
                                        array(
                                            'type' => 'element',
                                            'name' => 'input',
                                            'line' => 0,
                                            'position' => 0,
                                            'attributes' => array(
                                                'type' => 'hidden',
                                                'value' => '9'
                                            )
                                        )
                                    )
                                )
                            )
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'input',
                            'line' => 0,
                            'position' => 0,
                            'attributes' => array(
                                'type' => 'submit',
                                'value' => 'Search...'
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * @dataProvider impliedClosingTagDataProvider
     */
    public function testImpliedClosingTag($html, $expectedArray)
    {
        $element = new Element();
        $element->parse($html);
        $this->assertEquals($expectedArray, $element->toArray());
    }

    public function impliedClosingTagDataProvider()
    {
        return array(
            'head' => array(
                '<html><head><body></body></html>',
                array(
                    'type' => 'element',
                    'name' => 'html',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'head',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'body',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            ),
            'closed-only elements' => array(
                '<div><base><link><meta><hr><br><asdf /></div>',
                array(
                    'type' => 'element',
                    'name' => 'div',
                    'line' => 0,
                    'position' => 0,
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'base',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'link',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'meta',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'hr',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'br',
                            'line' => 0,
                            'position' => 0
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'asdf',
                            'line' => 0,
                            'position' => 0
                        )
                    )
                )
            )
        );
    }

    public function testAttributes()
    {
        $element = new Element();
        $this->assertFalse($element->hasAttributes());
        $element->parse('<img class="asdf" />');
        $this->assertTrue($element->hasAttributes());
        $this->assertEquals(
            array('class' => 'asdf'),
            $element->getAttributes()
        );
    }

    public function testChildren()
    {
        $element = new Element();
        $this->assertFalse($element->hasChildren());
        $element->parse('<div>asdf</div>');
        $this->assertTrue($element->hasChildren());
        $this->assertEquals(1, count($element->getChildren()));
    }
}
