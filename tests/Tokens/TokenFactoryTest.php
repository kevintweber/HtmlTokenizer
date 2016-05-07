<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens;

class TokenFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider buildFromHtmlDataProvider
     */
    public function testBuildFromHtml($html, $expectedClassName)
    {
        $result = Tokens\TokenFactory::buildFromHtml($html);
        $this->assertInstanceOf($expectedClassName, $result);
    }

    public function buildFromHtmlDataProvider()
    {
        return array(
            array(
                'asdf',
                'Kevintweber\HtmlTokenizer\Tokens\Text'
            ),
            array(
                '<asdf />',
                'Kevintweber\HtmlTokenizer\Tokens\Element'
            ),
            array(
                '<!-- asdf -->',
                'Kevintweber\HtmlTokenizer\Tokens\Comment'
            ),
            array(
                '<![CDATA[asdf]]>',
                'Kevintweber\HtmlTokenizer\Tokens\CData'
            ),
            array(
                '<!DOCTYPE asdf >',
                'Kevintweber\HtmlTokenizer\Tokens\DocType'
            ),
            array(
                '<?php asdf; ?>',
                'Kevintweber\HtmlTokenizer\Tokens\Php'
            ),
            array(
                '<? asdf; ?>',
                'Kevintweber\HtmlTokenizer\Tokens\Php'
            )
        );
    }

    public function testNoTypeFound()
    {
        $this->assertFalse(Tokens\TokenFactory::buildFromHtml('< asdfasdf'));
    }

    /**
     * @expectedException Kevintweber\HtmlTokenizer\Exceptions\TokenMatchingException
     */
    public function testExceptionInBuildFromHtml()
    {
        Tokens\TokenFactory::buildFromHtml('< asdfasdf', null, true);
    }
}
