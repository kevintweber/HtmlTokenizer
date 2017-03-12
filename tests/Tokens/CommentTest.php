<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Comment;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, $expectedValue, $expectedRemainingHtml)
    {
        $comment = new Comment(null, false);
        $remainingHtml = $comment->parse($html);
        $this->assertSame($expectedValue, $comment->getValue());
        $this->assertSame($expectedRemainingHtml, $remainingHtml);
    }

    public function parseDataProvider()
    {
        return array(
            'simple' => array(
                '<!-- asdf -->',
                'asdf',
                ''
            ),
            'with element' => array(
                '<!-- asdf --><whoa />',
                'asdf',
                '<whoa />'
            ),
            'with whitespace' => array(
                '   <!--     asdf      -->    <whoa />',
                'asdf',
                '    <whoa />'
            ),
            'no whitespace' => array(
                '<!--asdf-->yo',
                'asdf',
                'yo'
            ),
            'two comments' => array(
                "<!-- asdf -->\n\n<!-- asdf -->",
                'asdf',
                "\n\n<!-- asdf -->"
            ),
            'parse error' => array(
                '<!-- asdf',
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
        $comment = new Comment(null, true);
        $comment->parse('<!-- asdf');
    }

    /**
     * @dataProvider toArrayDataProvider
     */
    public function testToArray($html, $expectedArray)
    {
        $comment = new Comment();
        $comment->parse($html);
        $this->assertEquals($expectedArray, $comment->toArray());
    }

    public function toArrayDataProvider()
    {
        return array(
            'simple' => array(
                '<!-- asdf -->',
                array(
                    'type' => 'comment',
                    'value' => 'asdf',
                    'line' => 0,
                    'position' => 0
                )
            )
        );
    }
}

