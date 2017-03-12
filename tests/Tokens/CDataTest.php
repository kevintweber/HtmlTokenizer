<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\CData;
use PHPUnit\Framework\TestCase;

class CDataTest extends TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, $expectedValue, $expectedRemainingHtml)
    {
        $cData = new CData(null, false);
        $remainingHtml = $cData->parse($html);
        $this->assertSame($expectedValue, $cData->getValue());
        $this->assertSame($expectedRemainingHtml, $remainingHtml);
    }

    public function parseDataProvider()
    {
        return array(
            'simple' => array(
                '<![CDATA[asdf]]>',
                'asdf',
                ''
            ),
            'with element' => array(
                '<![CDATA[asdf]]><whoa />',
                'asdf',
                '<whoa />'
            ),
            'with whitespace' => array(
                '    <![CDATA[      asdf     ]]>    <whoa />',
                'asdf',
                '    <whoa />'
            ),
            'parse error' => array(
                '<![CDATA[      asdf',
                '',
                ''
            )
        );
    }

    /**
     * @expectedException Kevintweber\HtmlTokenizer\Exceptions\ParseException
     */
    public function testExceptionInParse()
    {
        $cData = new CData(null, true);
        $cData->parse('<![CDATA[asdf');
    }

    /**
     * @dataProvider toArrayDataProvider
     */
    public function testToArray($html, $expectedArray)
    {
        $cData = new CData();
        $cData->parse($html);
        $this->assertEquals($expectedArray, $cData->toArray());
    }

    public function toArrayDataProvider()
    {
        return array(
            'simple' => array(
                '<![CDATA[asdf]]>',
                array(
                    'type' => 'cdata',
                    'value' => 'asdf',
                    'line' => 0,
                    'position' => 0
                )
            )
        );
    }
}

