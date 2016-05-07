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
            ),
            'contains php' => array(
                '<!-- comment --><div class="asdf1"><?php echo "asdf5"; ?></div>',
                array(
                    array(
                        'type' => 'comment',
                        'value' => 'comment'
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
                    ),
                )
            )
        );
    }
}
