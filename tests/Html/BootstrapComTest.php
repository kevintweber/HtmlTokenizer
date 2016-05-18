<?php

namespace Kevintweber\HtmlTokenizer\Tests\Html;

use Kevintweber\HtmlTokenizer\HtmlTokenizer;

class BootstrapComTest extends \PHPUnit_Framework_TestCase
{
    /**
     * I really want to test a real world webpage.
     */
    public function testBootstrapCom()
    {
        $bootstrapHtml = file_get_contents(__DIR__ . '/bootstrap-com.html');
        $htmlTokenizer = new HtmlTokenizer();
        $tokens = $htmlTokenizer->parse($bootstrapHtml);
        $this->assertEquals(
            array (
                0 =>
                array (
                    'type' => 'doctype',
                    'value' => 'html',
                    'line' => 0,
                    'position' => 0,
                ),
                1 =>
                array (
                    'type' => 'element',
                    'name' => 'html',
                    'line' => 0,
                    'position' => 16,
                    'attributes' =>
                    array (
                        'lang' => 'en',
                    ),
                    'children' =>
                    array (
                        0 =>
                        array (
                            'type' => 'element',
                            'name' => 'head',
                            'line' => 0,
                            'position' => 31,
                            'children' =>
                            array (
                                0 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'line' => 0,
                                    'position' => 39,
                                    'attributes' =>
                                    array (
                                        'charset' => 'utf-8',
                                    ),
                                ),
                                1 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'line' => 0,
                                    'position' => 60,
                                    'attributes' =>
                                    array (
                                        'http-equiv' => 'X-UA-Compatible',
                                        'content' => 'IE=edge',
                                    ),
                                ),
                                2 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'line' => 0,
                                    'position' => 112,
                                    'attributes' =>
                                    array (
                                        'name' => 'viewport',
                                        'content' => 'width=device-width,initial-scale=1',
                                    ),
                                ),
                                3 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'line' => 0,
                                    'position' => 178,
                                    'attributes' =>
                                    array (
                                        'name' => 'description',
                                        'content' => 'Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.',
                                    ),
                                ),
                                4 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'line' => 0,
                                    'position' => 328,
                                    'attributes' =>
                                    array (
                                        'name' => 'keywords',
                                        'content' => 'HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development',
                                    ),
                                ),
                                5 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'line' => 0,
                                    'position' => 445,
                                    'attributes' =>
                                    array (
                                        'name' => 'author',
                                        'content' => 'Mark Otto, Jacob Thornton, and Bootstrap contributors',
                                    ),
                                ),
                                6 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'title',
                                    'line' => 0,
                                    'position' => 528,
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => ' Bootstrap &middot; The world\'s most popular mobile-first and responsive front-end framework. ',
                                            'line' => 0,
                                            'position' => 535,
                                        ),
                                    ),
                                ),
                                7 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'link',
                                    'line' => 0,
                                    'position' => 639,
                                    'attributes' =>
                                    array (
                                        'href' => '../dist/css/bootstrap.min.css',
                                        'rel' => 'stylesheet',
                                    ),
                                ),
                                8 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'link',
                                    'line' => 0,
                                    'position' => 697,
                                    'attributes' =>
                                    array (
                                        'href' => '../assets/css/docs.min.css',
                                        'rel' => 'stylesheet',
                                    ),
                                ),
                                9 =>
                                array (
                                    'type' => 'comment',
                                    'value' => '[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]',
                                    'line' => 0,
                                    'position' => 751,
                                ),
                                10 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 0,
                                    'position' => 848,
                                    'attributes' =>
                                    array (
                                        'src' => '../assets/js/ie-emulation-modes-warning.js',
                                    ),
                                ),
                                11 =>
                                array (
                                    'type' => 'comment',
                                    'value' => '[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]',
                                    'line' => 0,
                                    'position' => 912,
                                ),
                                12 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'link',
                                    'line' => 1,
                                    'position' => 90,
                                    'attributes' =>
                                    array (
                                        'rel' => 'apple-touch-icon',
                                        'href' => '/apple-touch-icon.png',
                                    ),
                                ),
                                13 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'link',
                                    'line' => 1,
                                    'position' => 145,
                                    'attributes' =>
                                    array (
                                        'rel' => 'icon',
                                        'href' => '/favicon.ico',
                                    ),
                                ),
                                14 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 179,
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => '!function(e,t,a,n,c,o,s){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,o=t.createElement(a),s=t.getElementsByTagName(a)[0],o.async=1,o.src=n,s.parentNode.insertBefore(o,s)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-146052-10","getbootstrap.com"),ga("send","pageview");',
                                            'line' => 1,
                                            'position' => 187,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        1 =>
                        array (
                            'type' => 'element',
                            'name' => 'body',
                            'line' => 1,
                            'position' => 575,
                            'attributes' =>
                            array (
                                'class' => 'bs-docs-home',
                            ),
                            'children' =>
                            array (
                                0 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'a',
                                    'line' => 1,
                                    'position' => 601,
                                    'attributes' =>
                                    array (
                                        'id' => 'skippy',
                                        'class' => 'sr-only sr-only-focusable',
                                        'href' => '#content',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'element',
                                            'name' => 'div',
                                            'line' => 1,
                                            'position' => 662,
                                            'attributes' =>
                                            array (
                                                'class' => 'container',
                                            ),
                                            'children' =>
                                            array (
                                                0 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'span',
                                                    'line' => 1,
                                                    'position' => 683,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'skiplink-text',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Skip to main content',
                                                            'line' => 1,
                                                            'position' => 709,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                1 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'a',
                                    'line' => 1,
                                    'position' => 747,
                                    'attributes' =>
                                    array (
                                        'href' => 'http://blog.getbootstrap.com/2015/08/19/bootstrap-4-alpha/',
                                        'class' => 'v4-tease',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => 'Aww yeah, Bootstrap 4 is coming!',
                                            'line' => 1,
                                            'position' => 833,
                                        ),
                                    ),
                                ),
                                2 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'header',
                                    'line' => 1,
                                    'position' => 871,
                                    'attributes' =>
                                    array (
                                        'class' => 'navbar navbar-static-top bs-docs-nav',
                                        'id' => 'top',
                                        'role' => 'banner',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'element',
                                            'name' => 'div',
                                            'line' => 1,
                                            'position' => 944,
                                            'attributes' =>
                                            array (
                                                'class' => 'container',
                                            ),
                                            'children' =>
                                            array (
                                                0 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
                                                    'line' => 1,
                                                    'position' => 966,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'navbar-header',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'button',
                                                            'line' => 1,
                                                            'position' => 992,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'navbar-toggle collapsed',
                                                                'type' => 'button',
                                                                'data-toggle' => 'collapse',
                                                                'data-target' => '#bs-navbar',
                                                                'aria-controls' => 'bs-navbar',
                                                                'aria-expanded' => 'false',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
                                                                    'line' => 1,
                                                                    'position' => 1133,
                                                                    'attributes' =>
                                                                    array (
                                                                        'class' => 'sr-only',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Toggle navigation',
                                                                            'line' => 1,
                                                                            'position' => 1153,
                                                                        ),
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
                                                                    'line' => 1,
                                                                    'position' => 1178,
                                                                    'attributes' =>
                                                                    array (
                                                                        'class' => 'icon-bar',
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
                                                                    'line' => 1,
                                                                    'position' => 1207,
                                                                    'attributes' =>
                                                                    array (
                                                                        'class' => 'icon-bar',
                                                                    ),
                                                                ),
                                                                3 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
                                                                    'line' => 1,
                                                                    'position' => 1236,
                                                                    'attributes' =>
                                                                    array (
                                                                        'class' => 'icon-bar',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 1275,
                                                            'attributes' =>
                                                            array (
                                                                'href' => '..',
                                                                'class' => 'navbar-brand',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'Bootstrap',
                                                                    'line' => 1,
                                                                    'position' => 1306,
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'nav',
                                                    'line' => 1,
                                                    'position' => 1327,
                                                    'attributes' =>
                                                    array (
                                                        'id' => 'bs-navbar',
                                                        'class' => 'collapse navbar-collapse',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'ul',
                                                            'line' => 1,
                                                            'position' => 1379,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'nav navbar-nav',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1407,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1412,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../getting-started/',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Getting started',
                                                                                    'line' => 1,
                                                                                    'position' => 1442,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1468,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1473,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../css/',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'CSS',
                                                                                    'line' => 1,
                                                                                    'position' => 1491,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1505,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1510,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../components/',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Components',
                                                                                    'line' => 1,
                                                                                    'position' => 1535,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                3 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1556,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1561,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../javascript/',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'JavaScript',
                                                                                    'line' => 1,
                                                                                    'position' => 1586,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                4 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1607,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1612,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../customize/',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Customize',
                                                                                    'line' => 1,
                                                                                    'position' => 1636,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'ul',
                                                            'line' => 1,
                                                            'position' => 1662,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'nav navbar-nav navbar-right',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1703,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1707,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => 'http://themes.getbootstrap.com',
                                                                                'onclick' => 'ga(&quot;send&quot;,&quot;event&quot;,&quot;Navbar&quot;,&quot;Community links&quot;,&quot;Themes&quot;)',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Themes',
                                                                                    'line' => 1,
                                                                                    'position' => 1861,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 1877,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 1881,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => 'http://expo.getbootstrap.com',
                                                                                'onclick' => 'ga(&quot;send&quot;,&quot;event&quot;,&quot;Navbar&quot;,&quot;Community links&quot;,&quot;Expo&quot;)',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Expo',
                                                                                    'line' => 1,
                                                                                    'position' => 2031,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'line' => 1,
                                                                    'position' => 2045,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 2049,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => 'http://blog.getbootstrap.com',
                                                                                'onclick' => 'ga(&quot;send&quot;,&quot;event&quot;,&quot;Navbar&quot;,&quot;Community links&quot;,&quot;Blog&quot;)',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Blog',
                                                                                    'line' => 1,
                                                                                    'position' => 2199,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                3 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'main',
                                    'line' => 1,
                                    'position' => 2244,
                                    'attributes' =>
                                    array (
                                        'class' => 'bs-docs-masthead',
                                        'id' => 'content',
                                        'role' => 'main',
                                        'tabindex' => '-1',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'element',
                                            'name' => 'div',
                                            'line' => 1,
                                            'position' => 2307,
                                            'attributes' =>
                                            array (
                                                'class' => 'container',
                                            ),
                                            'children' =>
                                            array (
                                                0 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'span',
                                                    'line' => 1,
                                                    'position' => 2329,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'bs-docs-booticon bs-docs-booticon-lg bs-docs-booticon-outline',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'B',
                                                            'line' => 1,
                                                            'position' => 2405,
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 2414,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'lead',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.',
                                                            'line' => 1,
                                                            'position' => 2428,
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 2551,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'lead',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 2566,
                                                            'attributes' =>
                                                            array (
                                                                'href' => 'getting-started#download',
                                                                'class' => 'btn btn-outline-inverse btn-lg',
                                                                'onclick' => 'ga(&quot;send&quot;,&quot;event&quot;,&quot;Jumbotron actions&quot;,&quot;Download&quot;,&quot;Download 3.3.6&quot;)',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'Download Bootstrap',
                                                                    'line' => 1,
                                                                    'position' => 2765,
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                3 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 2793,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'version',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Currently v3.3.6',
                                                            'line' => 1,
                                                            'position' => 2810,
                                                        ),
                                                    ),
                                                ),
                                                4 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
                                                    'line' => 1,
                                                    'position' => 2831,
                                                    'attributes' =>
                                                    array (
                                                        'id' => 'carbonads-container',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 2859,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'carbonad',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'div',
                                                                    'line' => 1,
                                                                    'position' => 2879,
                                                                    'attributes' =>
                                                                    array (
                                                                        'id' => 'azcarbon',
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'script',
                                                                    'line' => 1,
                                                                    'position' => 2902,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'var z=document.createElement("script");z.async=!0,z.src="http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(z,s);',
                                                                            'line' => 1,
                                                                            'position' => 2910,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                4 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'div',
                                    'line' => 1,
                                    'position' => 3139,
                                    'attributes' =>
                                    array (
                                        'class' => 'bs-docs-featurette',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'element',
                                            'name' => 'div',
                                            'line' => 1,
                                            'position' => 3170,
                                            'attributes' =>
                                            array (
                                                'class' => 'container',
                                            ),
                                            'children' =>
                                            array (
                                                0 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'h2',
                                                    'line' => 1,
                                                    'position' => 3192,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'bs-docs-featurette-title',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Designed for everyone, everywhere.',
                                                            'line' => 1,
                                                            'position' => 3227,
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 3267,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'lead',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Bootstrap makes front-end web development faster and easier. It\'s made for folks of all skill levels, devices of all shapes, and projects of all sizes.',
                                                            'line' => 1,
                                                            'position' => 3281,
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'hr',
                                                    'line' => 1,
                                                    'position' => 3437,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                3 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
                                                    'line' => 1,
                                                    'position' => 3458,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'row',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 3474,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-sm-4',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'img',
                                                                    'line' => 1,
                                                                    'position' => 3495,
                                                                    'attributes' =>
                                                                    array (
                                                                        'src' => 'assets/img/sass-less.png',
                                                                        'alt' => 'Sass and Less support',
                                                                        'class' => 'img-responsive',
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'h3',
                                                                    'line' => 1,
                                                                    'position' => 3579,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Preprocessors',
                                                                            'line' => 1,
                                                                            'position' => 3583,
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'p',
                                                                    'line' => 1,
                                                                    'position' => 3602,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors, ',
                                                                            'line' => 1,
                                                                            'position' => 3605,
                                                                        ),
                                                                        1 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 3708,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../css/#less',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Less',
                                                                                    'line' => 1,
                                                                                    'position' => 3729,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        2 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => ' and ',
                                                                            'line' => 1,
                                                                            'position' => 3737,
                                                                        ),
                                                                        3 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
                                                                            'line' => 1,
                                                                            'position' => 3742,
                                                                            'attributes' =>
                                                                            array (
                                                                                'href' => '../css/#sass',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Sass',
                                                                                    'line' => 1,
                                                                                    'position' => 3763,
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        4 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => '. Quickly get started with precompiled CSS or build on the source.',
                                                                            'line' => 1,
                                                                            'position' => 3771,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 3849,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-sm-4',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'img',
                                                                    'line' => 1,
                                                                    'position' => 3870,
                                                                    'attributes' =>
                                                                    array (
                                                                        'src' => 'assets/img/devices.png',
                                                                        'alt' => 'Responsive across devices',
                                                                        'class' => 'img-responsive',
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'h3',
                                                                    'line' => 1,
                                                                    'position' => 3956,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'One framework, every device.',
                                                                            'line' => 1,
                                                                            'position' => 3960,
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'p',
                                                                    'line' => 1,
                                                                    'position' => 3994,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Bootstrap easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries.',
                                                                            'line' => 1,
                                                                            'position' => 3997,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 4163,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-sm-4',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'img',
                                                                    'line' => 1,
                                                                    'position' => 4184,
                                                                    'attributes' =>
                                                                    array (
                                                                        'src' => 'assets/img/components.png',
                                                                        'alt' => 'Components',
                                                                        'class' => 'img-responsive',
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'h3',
                                                                    'line' => 1,
                                                                    'position' => 4256,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Full of features',
                                                                            'line' => 1,
                                                                            'position' => 4260,
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'p',
                                                                    'line' => 1,
                                                                    'position' => 4282,
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'With Bootstrap, you get extensive and beautiful documentation for common HTML elements, dozens of custom HTML and CSS components, and awesome jQuery plugins.',
                                                                            'line' => 1,
                                                                            'position' => 4285,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                4 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'hr',
                                                    'line' => 1,
                                                    'position' => 4461,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                5 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 4482,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'lead',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Bootstrap is open source. It\'s hosted, developed, and maintained on GitHub.',
                                                            'line' => 1,
                                                            'position' => 4496,
                                                        ),
                                                    ),
                                                ),
                                                6 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'a',
                                                    'line' => 1,
                                                    'position' => 4576,
                                                    'attributes' =>
                                                    array (
                                                        'href' => 'https://github.com/twbs/bootstrap',
                                                        'class' => 'btn btn-outline btn-lg',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'View the GitHub project',
                                                            'line' => 1,
                                                            'position' => 4649,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                5 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'div',
                                    'line' => 1,
                                    'position' => 4691,
                                    'attributes' =>
                                    array (
                                        'class' => 'bs-docs-featurette',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'element',
                                            'name' => 'div',
                                            'line' => 1,
                                            'position' => 4722,
                                            'attributes' =>
                                            array (
                                                'class' => 'container',
                                            ),
                                            'children' =>
                                            array (
                                                0 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'h2',
                                                    'line' => 1,
                                                    'position' => 4744,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'bs-docs-featurette-title',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Built with Bootstrap.',
                                                            'line' => 1,
                                                            'position' => 4779,
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 4806,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'lead',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Millions of amazing sites across the web are being built with Bootstrap. Get started on your own with our growing ',
                                                            'line' => 1,
                                                            'position' => 4820,
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 4934,
                                                            'attributes' =>
                                                            array (
                                                                'href' => '../getting-started/#examples',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'collection of examples',
                                                                    'line' => 1,
                                                                    'position' => 4971,
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ' or by exploring some of our favorites.',
                                                            'line' => 1,
                                                            'position' => 4997,
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'hr',
                                                    'line' => 1,
                                                    'position' => 5041,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                3 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
                                                    'line' => 1,
                                                    'position' => 5062,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'row bs-docs-featured-sites',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 5103,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-xs-6 col-sm-3',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 5135,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => 'http://expo.getbootstrap.com/2014/10/29/lyft',
                                                                        'target' => '_blank',
                                                                        'title' => 'Lyft',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'img',
                                                                            'line' => 1,
                                                                            'position' => 5215,
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-lyft.jpg',
                                                                                'alt' => 'Lyft',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 5293,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-xs-6 col-sm-3',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 5325,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => 'http://expo.getbootstrap.com/2014/09/30/vogue',
                                                                        'target' => '_blank',
                                                                        'title' => 'Vogue',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'img',
                                                                            'line' => 1,
                                                                            'position' => 5407,
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-vogue.jpg',
                                                                                'alt' => 'Vogue',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 5487,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-xs-6 col-sm-3',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 5519,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => 'http://expo.getbootstrap.com/2014/03/13/riot-design',
                                                                        'target' => '_blank',
                                                                        'title' => 'Riot Design',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'img',
                                                                            'line' => 1,
                                                                            'position' => 5615,
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-riot.jpg',
                                                                                'alt' => 'Riot Design',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
                                                            'line' => 1,
                                                            'position' => 5702,
                                                            'attributes' =>
                                                            array (
                                                                'class' => 'col-xs-6 col-sm-3',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 5734,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => 'http://expo.getbootstrap.com/2014/02/12/newsweek',
                                                                        'target' => '_blank',
                                                                        'title' => 'Newsweek',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'img',
                                                                            'line' => 1,
                                                                            'position' => 5822,
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-newsweek.jpg',
                                                                                'alt' => 'Newsweek',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                4 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'hr',
                                                    'line' => 1,
                                                    'position' => 5915,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                5 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 5936,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'lead',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'We showcase dozens of inspiring projects built with Bootstrap on the Bootstrap Expo.',
                                                            'line' => 1,
                                                            'position' => 5950,
                                                        ),
                                                    ),
                                                ),
                                                6 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'a',
                                                    'line' => 1,
                                                    'position' => 6039,
                                                    'attributes' =>
                                                    array (
                                                        'href' => 'http://expo.getbootstrap.com',
                                                        'class' => 'btn btn-outline btn-lg',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Explore the Expo',
                                                            'line' => 1,
                                                            'position' => 6107,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                6 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'footer',
                                    'line' => 1,
                                    'position' => 6143,
                                    'attributes' =>
                                    array (
                                        'class' => 'bs-docs-footer',
                                        'role' => 'contentinfo',
                                    ),
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'element',
                                            'name' => 'div',
                                            'line' => 1,
                                            'position' => 6190,
                                            'attributes' =>
                                            array (
                                                'class' => 'container',
                                            ),
                                            'children' =>
                                            array (
                                                0 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'ul',
                                                    'line' => 1,
                                                    'position' => 6212,
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'bs-docs-footer-links',
                                                    ),
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'line' => 1,
                                                            'position' => 6244,
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 6248,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => 'https://github.com/twbs/bootstrap',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'GitHub',
                                                                            'line' => 1,
                                                                            'position' => 6290,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'line' => 1,
                                                            'position' => 6306,
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 6310,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => 'https://twitter.com/getbootstrap',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Twitter',
                                                                            'line' => 1,
                                                                            'position' => 6351,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'line' => 1,
                                                            'position' => 6368,
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 6372,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => '../getting-started/#examples',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'Examples',
                                                                            'line' => 1,
                                                                            'position' => 6409,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'line' => 1,
                                                            'position' => 6427,
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
                                                                    'line' => 1,
                                                                    'position' => 6431,
                                                                    'attributes' =>
                                                                    array (
                                                                        'href' => '../about/',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'About',
                                                                            'line' => 1,
                                                                            'position' => 6451,
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 6472,
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Designed and built with all the love in the world by ',
                                                            'line' => 1,
                                                            'position' => 6475,
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 6528,
                                                            'attributes' =>
                                                            array (
                                                                'href' => 'https://twitter.com/mdo',
                                                                'target' => '_blank',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => '@mdo',
                                                                    'line' => 1,
                                                                    'position' => 6574,
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ' and ',
                                                            'line' => 1,
                                                            'position' => 6582,
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 6587,
                                                            'attributes' =>
                                                            array (
                                                                'href' => 'https://twitter.com/fat',
                                                                'target' => '_blank',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => '@fat',
                                                                    'line' => 1,
                                                                    'position' => 6633,
                                                                ),
                                                            ),
                                                        ),
                                                        4 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => '. Maintained by the ',
                                                            'line' => 1,
                                                            'position' => 6641,
                                                        ),
                                                        5 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 6661,
                                                            'attributes' =>
                                                            array (
                                                                'href' => 'https://github.com/orgs/twbs/people',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'core team',
                                                                    'line' => 1,
                                                                    'position' => 6705,
                                                                ),
                                                            ),
                                                        ),
                                                        6 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ' with the help of ',
                                                            'line' => 1,
                                                            'position' => 6718,
                                                        ),
                                                        7 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 6736,
                                                            'attributes' =>
                                                            array (
                                                                'href' => 'https://github.com/twbs/bootstrap/graphs/contributors',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'our contributors',
                                                                    'line' => 1,
                                                                    'position' => 6798,
                                                                ),
                                                            ),
                                                        ),
                                                        8 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => '.',
                                                            'line' => 1,
                                                            'position' => 6818,
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'line' => 1,
                                                    'position' => 6824,
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Code licensed ',
                                                            'line' => 1,
                                                            'position' => 6827,
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 6841,
                                                            'attributes' =>
                                                            array (
                                                                'rel' => 'license',
                                                                'href' => 'https://github.com/twbs/bootstrap/blob/master/LICENSE',
                                                                'target' => '_blank',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'MIT',
                                                                    'line' => 1,
                                                                    'position' => 6929,
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ', docs ',
                                                            'line' => 1,
                                                            'position' => 6936,
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
                                                            'line' => 1,
                                                            'position' => 6943,
                                                            'attributes' =>
                                                            array (
                                                                'rel' => 'license',
                                                                'href' => 'https://creativecommons.org/licenses/by/3.0',
                                                                'target' => '_blank',
                                                            ),
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'text',
                                                                    'value' => 'CC BY 3.0',
                                                                    'line' => 1,
                                                                    'position' => 7022,
                                                                ),
                                                            ),
                                                        ),
                                                        4 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => '.',
                                                            'line' => 1,
                                                            'position' => 7035,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                7 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 7060,
                                    'attributes' =>
                                    array (
                                        'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
                                    ),
                                ),
                                8 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 7147,
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => 'window.jQuery||document.write(\'<script src="../assets/js/vendor/jquery.min.js"><\\/script>\');',
                                            'line' => 1,
                                            'position' => 7155,
                                        ),
                                    ),
                                ),
                                9 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 7256,
                                    'attributes' =>
                                    array (
                                        'src' => '../dist/js/bootstrap.min.js',
                                    ),
                                ),
                                10 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 7305,
                                    'attributes' =>
                                    array (
                                        'src' => '../assets/js/docs.min.js',
                                    ),
                                ),
                                11 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 7351,
                                    'attributes' =>
                                    array (
                                        'src' => '../assets/js/ie10-viewport-bug-workaround.js',
                                    ),
                                ),
                                12 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'line' => 1,
                                    'position' => 7417,
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => 'var _gauges=_gauges||[];!function(){var e=document.createElement("script");e.async=!0,e.id="gauges-tracker",e.setAttribute("data-site-id","4f0dc9fef5a1f55508000013"),e.src="//secure.gaug.es/track.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}();',
                                            'line' => 1,
                                            'position' => 7425,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            $tokens->toArray()
        );
}
    }
