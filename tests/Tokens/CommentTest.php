<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Comment;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider parseDataProvider
     */
    public function testParse($html, $expectedValue, $expectedRemainingHtml)
    {
        $comment = new Comment();
        $remainingHtml = $comment->parse($html);
        $this->assertEquals($expectedValue, $comment->getValue());
        $this->assertEquals($expectedRemainingHtml, $remainingHtml);
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
                '<!--     asdf      -->      <whoa />',
                'asdf',
                '<whoa />'
            ),
            'no whitespace' => array(
                '<!--asdf-->yo',
                'asdf',
                'yo'
            ),
            'two comments' => array(
                "<!-- asdf -->\n\n<!-- asdf -->",
                'asdf',
                '<!-- asdf -->'
            ),
            'parse error' => array(
                '<!-- asdf',
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
                    'value' => 'asdf'
                )
            )
        );
    }
}

