<?php

namespace Kevintweber\HtmlTokenizer\Tests;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;

class HtmlTokenizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, array $expectedTokenArray, $debug = false)
    {
        $htmlTokenizer = new HtmlTokenizer();
        $tokens = $htmlTokenizer->parse($html);
        if ($debug) {
            var_dump($html, $tokens->toArray());
        }

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
                        'value' => 'asdf '
                    )
                )
            ),
            'contains php' => array(
                '<!-- comments --><div class="asdf1"><?php echo "asdf5"; ?></div>',
                array(
                    array(
                        'type' => 'comment',
                        'value' => 'comments'
                    ),
                    array(
                        'type' => 'element',
                        'name' => 'div',
                        'attributes' => array(
                            'class' => 'asdf1'
                        ),
                        'children' => array(
                            array(
                                'type' => 'php',
                                'value' => 'echo "asdf5";'
                            )
                        )
                    )
                )
            )
        );
    }
}
