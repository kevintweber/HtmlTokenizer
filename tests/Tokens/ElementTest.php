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
                null,
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
            'closed with 1 attribute' => array(
                '<asdf foo="bar"/>',
                array(
                    'type' => 'element',
                    'name' => 'asdf',
                    'attributes' => array(
                        'foo' => 'bar'
                    )
                )
            )
        );
    }
}

