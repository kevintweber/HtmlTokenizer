<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Element;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider isMatchDataProvider
     */
    public function testIsMatch($html, $expectedOutput)
    {
        $this->assertSame((boolean) $expectedOutput, Element::isMatch($html));
    }

    public function isMatchDataProvider()
    {
        return array(
            'cdata' => array('<![CDATA[asdf]]>', false),
            'comment' => array('<!-- asdf -->', false),
            'doctype' => array('<!DOCTYPE HTML>', false),
            'element' => array('<asdf />asdf', true),
            'text' => array('asdf', false)
        );
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
}

