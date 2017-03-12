<?php

namespace Kevintweber\HtmlTokenizer\Tests;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;
use PHPUnit\Framework\TestCase;

class HtmlTokenizerTest extends TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse(string $html, array $expectedTokenArray)
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
                        'value' => 'asdf',
                        'line' => 0,
                        'position' => 0
                    )
                )
            ),
            'contains php' => array(
                '<!-- comments --><div class="asdf1"><?php echo "asdf5"; ?></div>',
                array(
                    array(
                        'type' => 'comment',
                        'value' => 'comments',
                        'line' => 0,
                        'position' => 0
                    ),
                    array(
                        'type' => 'element',
                        'name' => 'div',
                        'line' => 0,
                        'position' => 17,
                        'attributes' => array(
                            'class' => 'asdf1'
                        ),
                        'children' => array(
                            array(
                                'type' => 'php',
                                'value' => 'echo "asdf5";',
                                'line' => 0,
                                'position' => 36
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * @dataProvider parseWithErrorsDataProvider
     * @expectedException Kevintweber\HtmlTokenizer\Exceptions\TokenMatchingException
     */
    public function testParseWithErrors(string $html)
    {
        $htmlTokenizer = new HtmlTokenizer();
        $htmlTokenizer->parse($html);
    }

    public function parseWithErrorsDataProvider()
    {
        return array(
            'token matching error' => array(
                'asdf  <'
            )
        );
    }

    /**
     * @dataProvider parseWithSilentErrorsDataProvider
     */
    public function testParseWithSilentErrors(string $html, array $expectedTokenArray)
    {
        $htmlTokenizer = new HtmlTokenizer(false);
        $tokens = $htmlTokenizer->parse($html);

        $this->assertEquals(
            $expectedTokenArray,
            $tokens->toArray()
        );
    }

    public function parseWithSilentErrorsDataProvider()
    {
        return array(
            'token matching error' => array(
                'asdf  <',
                array(
                    array(
                        'type' => 'text',
                        'value' => 'asdf ',
                        'line' => 0,
                        'position' => 0
                    )
                )
            ),
            'empty element error' => array(
                'asdf < > asdf',
                array(
                    array(
                        'type' => 'text',
                        'value' => 'asdf ',
                        'line' => 0,
                        'position' => 0
                    )
                )
            )
        );
    }

    /**
     * @dataProvider getPositionDataProvider
     */
    public function testGetPosition($html, $partialHtml, $expectedLine, $expectedPosition)
    {
        $htmlTokenizer = new HtmlTokenizer();
        $tokens = $htmlTokenizer->parse($html);
        $positionArray = HtmlTokenizer::getPosition($partialHtml);
        $this->assertEquals($expectedLine, $positionArray['line']);
        $this->assertEquals($expectedPosition, $positionArray['position']);
    }

    public function getPositionDataProvider()
    {
        return array(
            'single line - 1' => array(
                '<html><head><title>Asdf1</title></head><body>Yo!</body></html>',
                '<head><title>Asdf1</title></head><body>Yo!</body></html>',
                0,
                6
            ),
            'single line - 2' => array(
                '<html><head><title>Asdf1</title></head><body>Yo!</body></html>',
                '<body>Yo!</body></html>',
                0,
                39
            ),
            'multiple lines - 1' => array(
                '<html>
    <head>
        <title>Asdf1</title>
    </head>
    <body>Yo!</body>
</html>',
                '<head>
        <title>Asdf1</title>
    </head>
    <body>Yo!</body>
</html>',
                1,
                5
            ),
            'multiple lines - 1' => array(
                '<html>
    <head>
        <title>Asdf1</title>
    </head>
    <body>Yo!</body>
</html>',
                '<body>Yo!</body>
</html>',
                4,
                5
            )
        );
    }
}
