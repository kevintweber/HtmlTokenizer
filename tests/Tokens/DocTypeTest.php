<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\DocType;

class DocTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, $expectedValue, $expectedRemainingHtml)
    {
        $docType = new DocType();
        $remainingHtml = $docType->parse($html);
        $this->assertEquals($expectedValue, $docType->getValue());
        $this->assertEquals($expectedRemainingHtml, $remainingHtml);
    }

    public function parseDataProvider()
    {
        return array(
            'simple' => array(
                '<!DOCTYPE asdf>',
                'asdf',
                ''
            ),
            'with element' => array(
                '<!DOCTYPE asdf><whoa />',
                'asdf',
                '<whoa />'
            ),
            'with whitespace' => array(
                '<!DOCTYPE        asdf                >yo',
                'asdf',
                'yo'
            ),
            'non-standard' => array(
                '<!docType ASDF>',
                'ASDF',
                ''
            ),
            'parse error' => array(
                '<!DOCTYPE ASDF',
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
        $docType = new DocType(null, true);
        $docType->parse('<!-- asdf');
    }

    /**
     * @dataProvider toArrayDataProvider
     */
    public function testToArray($html, $expectedArray)
    {
        $docType = new DocType();
        $docType->parse($html);
        $this->assertEquals($expectedArray, $docType->toArray());
    }

    public function toArrayDataProvider()
    {
        return array(
            'simple' => array(
                '<!DOCTYPE asdf>',
                array(
                    'type' => 'doctype',
                    'value' => 'asdf',
                    'line' => 0,
                    'position' => 0
                )
            )
        );
    }
}

