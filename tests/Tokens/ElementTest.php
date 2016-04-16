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
            'base' => array(
                '<meta>',
                $this->createElement('base'),
                true
            ),
            'link' => array(
                '<meta>',
                $this->createElement('link'),
                true
            ),
            'meta' => array(
                '<meta>',
                $this->createElement('meta'),
                true
            ),
            'hr' => array(
                '<div>',
                $this->createElement('hr'),
                true
            ),
            'br' => array(
                '<div>',
                $this->createElement('br'),
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
                '<?php echo "asdf"; ?></asdf>'
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
    public function testToArray($html, $expectedArray)
    {
        $element = new Element();
        $element->parse($html);
        $this->assertEquals($expectedArray, $element->toArray());
    }

    public function toArrayDataProvider()
    {
        return array(
            'simple closed' => array(
                '<asdf/>',
                array(
                    'type' => 'element',
                    'name' => 'asdf'
                )
            ),
            'simple closed followed by text' => array(
                '<asdf/>asdfasdf',
                array(
                    'type' => 'element',
                    'name' => 'asdf'
                )
            ),
            'closed with valueless attribute' => array(
                '<asdf foo1 />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
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
                    'attributes' => array(
                        'foo4' => 'bar4'
                    )
                )
            ),
            'closed with multiple attributes' => array(
                '<asdf     foo1="bar1"     foo2="bar2" foo3="bar3"      />',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
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
                    'attributes' => array(
                        'foo1' => true,
                        'foo2' => 'bar2',
                        'foo3' => 'bar3\\\'bar3',
                        'foo4' => 'bar4\\"bar4',
                    )
                )
            ),
            'simple open' => array(
                '<asdf></asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf'
                )
            ),
            'simple open with text content' => array(
                '<asdf>foo</asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'foo'
                        )
                    )
                )
            ),
            'open with text content and whitespace' => array(
                '<asdf foo="bar" >   foo-bar    </asdf>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'attributes' => array(
                        'foo' => 'bar'
                    ),
                    'children' => array(
                        array(
                            'type' => 'text',
                            'value' => 'foo-bar'
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
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'head'
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'body'
                        )
                    )
                )
            ),
            'closed-only elements' => array(
                '<div><base><link><meta><hr><br><asdf /></div>',
                array(
                    'type' => 'element',
                    'name' => 'div',
                    'children' => array(
                        array(
                            'type' => 'element',
                            'name' => 'base'
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'link'
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'meta'
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'hr'
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'br'
                        ),
                        array(
                            'type' => 'element',
                            'name' => 'asdf'
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

