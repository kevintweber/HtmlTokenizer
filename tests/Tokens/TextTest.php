<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Text;

class TextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider isMatchDataProvider
     */
    public function testIsMatch($html, $expectedOutput)
    {
        $this->assertSame((boolean) $expectedOutput, Text::isMatch($html));
    }

    public function isMatchDataProvider()
    {
        return array(
            'cdata' => array('<![CDATA[asdf]]>', false),
            'comment' => array('<!-- asdf -->', false),
            'doctype' => array('<!DOCTYPE HTML>', false),
            'element' => array('<asdf />asdf', false),
            'text' => array('asdf', true)
        );
    }

    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, $expectedValue, $expectedRemainingHtml)
    {
        $text = new Text();
        $remainingHtml = $text->parse($html);
        $this->assertEquals($expectedValue, $text->getValue());
        $this->assertEquals($expectedRemainingHtml, $remainingHtml);
    }

    public function parseDataProvider()
    {
        return array(
            'simple' => array(
                'asdf',
                'asdf',
                ''
            ),
            'with element' => array(
                'asdf<whoa />',
                'asdf',
                '<whoa />'
            ),
            'with element and trailing whitespace' => array(
                'asdf      <whoa />',
                'asdf',
                '<whoa />'
            ),
            'with comment' => array(
                'asdf<!-- comment -->',
                'asdf',
                '<!-- comment -->'
            )
        );
    }

    /**
     * @dataProvider toArrayDataProvider
     */
    public function testToArray($html, $expectedArray)
    {
        $text = new Text();
        $text->parse($html);
        $this->assertEquals($expectedArray, $text->toArray());
    }

    public function toArrayDataProvider()
    {
        return array(
            'simple' => array(
                'asdf',
                array(
                    'type' => 'text',
                    'value' => 'asdf'
                )
            )
        );
    }
}

