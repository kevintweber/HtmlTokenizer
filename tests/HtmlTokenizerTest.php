<?php

namespace Kevintweber\HtmlTokenizer\Tests;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;

class HtmlTokenizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, array $expectedTokenArray)
    {
        $htmlTokenizer = new HtmlTokenizer();
        $tokens = $htmlTokenizer->parse($html);
        $this->assertEquals(
            $expectedTokenArray,
            $tokens->toArray()
        );
    }

    public function parseDataProvider()
    {
        return array(
            'text only' => array(
                'asdf',
                array(
                    array(
                        'type' => 'text',
                        'value' => 'asdf'
                    )
                )
            ),
            'token matching error' => array(
                'asdf  <',
                array(
                    array(
                        'type' => 'text',
                        'value' => 'asdf'
                    )
                )
            )
        );
    }
}
