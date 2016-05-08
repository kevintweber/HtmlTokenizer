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
                ),
                1 =>
                array (
                    'type' => 'element',
                    'name' => 'html',
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
                            'children' =>
                            array (
                                0 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
                                    'attributes' =>
                                    array (
                                        'charset' => 'utf-8',
                                    ),
                                ),
                                1 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'meta',
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
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => ' Bootstrap &middot; The world\'s most popular mobile-first and responsive front-end framework. ',
                                        ),
                                    ),
                                ),
                                7 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'link',
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
                                ),
                                10 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
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
                                ),
                                12 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'link',
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
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => '!function(e,t,a,n,c,o,s){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,o=t.createElement(a),s=t.getElementsByTagName(a)[0],o.async=1,o.src=n,s.parentNode.insertBefore(o,s)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-146052-10","getbootstrap.com"),ga("send","pageview");',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        1 =>
                        array (
                            'type' => 'element',
                            'name' => 'body',
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
                                        ),
                                    ),
                                ),
                                2 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'header',
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
                                                                        ),
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
                                                                    'attributes' =>
                                                                    array (
                                                                        'class' => 'icon-bar',
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
                                                                    'attributes' =>
                                                                    array (
                                                                        'class' => 'icon-bar',
                                                                    ),
                                                                ),
                                                                3 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'span',
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
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'nav',
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
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                3 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                4 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                                                ),
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                2 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'li',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'a',
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
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                3 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                        ),
                                                    ),
                                                ),
                                                4 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
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
                                                                    'attributes' =>
                                                                    array (
                                                                        'id' => 'azcarbon',
                                                                    ),
                                                                ),
                                                                1 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'script',
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => 'var z=document.createElement("script");z.async=!0,z.src="http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(z,s);',
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
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'hr',
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                3 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
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
                                                                    'attributes' =>
                                                                    array (
                                                                        'src' => 'assets/img/sass-less.png',
                                                                        'alt' => 'Sass and Less support',
                                                                        'class' => 'img-responsive',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'h3',
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Preprocessors',
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        1 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'p',
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors, ',
                                                                                ),
                                                                                1 =>
                                                                                array (
                                                                                    'type' => 'element',
                                                                                    'name' => 'a',
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
                                                                                        ),
                                                                                    ),
                                                                                ),
                                                                                2 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => ' and ',
                                                                                ),
                                                                                3 =>
                                                                                array (
                                                                                    'type' => 'element',
                                                                                    'name' => 'a',
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
                                                                                        ),
                                                                                    ),
                                                                                ),
                                                                                4 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => '. Quickly get started with precompiled CSS or build on the source.',
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        2 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => ' ',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
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
                                                                    'attributes' =>
                                                                    array (
                                                                        'src' => 'assets/img/devices.png',
                                                                        'alt' => 'Responsive across devices',
                                                                        'class' => 'img-responsive',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'h3',
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'One framework, every device.',
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        1 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'p',
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Bootstrap easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries.',
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        2 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => ' ',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'div',
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
                                                                    'attributes' =>
                                                                    array (
                                                                        'src' => 'assets/img/components.png',
                                                                        'alt' => 'Components',
                                                                        'class' => 'img-responsive',
                                                                    ),
                                                                    'children' =>
                                                                    array (
                                                                        0 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'h3',
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'Full of features',
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        1 =>
                                                                        array (
                                                                            'type' => 'element',
                                                                            'name' => 'p',
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => 'With Bootstrap, you get extensive and beautiful documentation for common HTML elements, dozens of custom HTML and CSS components, and awesome jQuery plugins.',
                                                                                ),
                                                                            ),
                                                                        ),
                                                                        2 =>
                                                                        array (
                                                                            'type' => 'text',
                                                                            'value' => ' ',
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
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                5 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                        ),
                                                    ),
                                                ),
                                                6 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'a',
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
                                                        ),
                                                    ),
                                                ),
                                                1 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ' or by exploring some of our favorites.',
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'hr',
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                3 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'div',
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
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-lyft.jpg',
                                                                                'alt' => 'Lyft',
                                                                                'class' => 'img-responsive',
                                                                            ),
'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => ' ',
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
                                                            'name' => 'div',
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
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-vogue.jpg',
                                                                                'alt' => 'Vogue',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => ' ',
                                                                                ),
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
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-riot.jpg',
                                                                                'alt' => 'Riot Design',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => ' ',
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
                                                            'name' => 'div',
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
                                                                            'attributes' =>
                                                                            array (
                                                                                'src' => '/assets/img/expo-newsweek.jpg',
                                                                                'alt' => 'Newsweek',
                                                                                'class' => 'img-responsive',
                                                                            ),
                                                                            'children' =>
                                                                            array (
                                                                                0 =>
                                                                                array (
                                                                                    'type' => 'text',
                                                                                    'value' => ' ',
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
                                                    'name' => 'hr',
                                                    'attributes' =>
                                                    array (
                                                        'class' => 'half-rule',
                                                    ),
                                                ),
                                                5 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
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
                                                        ),
                                                    ),
                                                ),
                                                6 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'a',
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
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
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
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
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
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
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
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'li',
                                                            'children' =>
                                                            array (
                                                                0 =>
                                                                array (
                                                                    'type' => 'element',
                                                                    'name' => 'a',
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
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Designed and built with all the love in the world by ',
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ' and ',
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        4 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => '. Maintained by the ',
                                                        ),
                                                        5 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        6 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ' with the help of ',
                                                        ),
                                                        7 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        8 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => '.',
                                                        ),
                                                    ),
                                                ),
                                                2 =>
                                                array (
                                                    'type' => 'element',
                                                    'name' => 'p',
                                                    'children' =>
                                                    array (
                                                        0 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => 'Code licensed ',
                                                        ),
                                                        1 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        2 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => ', docs ',
                                                        ),
                                                        3 =>
                                                        array (
                                                            'type' => 'element',
                                                            'name' => 'a',
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
                                                                ),
                                                            ),
                                                        ),
                                                        4 =>
                                                        array (
                                                            'type' => 'text',
                                                            'value' => '.',
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
                                    'attributes' =>
                                    array (
                                        'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
                                    ),
                                ),
                                8 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => 'window.jQuery||document.write(\'<script src="../assets/js/vendor/jquery.min.js"><\\/script>\');',
                                        ),
                                    ),
                                ),
                                9 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'attributes' =>
                                    array (
                                        'src' => '../dist/js/bootstrap.min.js',
                                    ),
                                ),
                                10 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'attributes' =>
                                    array (
                                        'src' => '../assets/js/docs.min.js',
                                    ),
                                ),
                                11 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'attributes' =>
                                    array (
                                        'src' => '../assets/js/ie10-viewport-bug-workaround.js',
                                    ),
                                ),
                                12 =>
                                array (
                                    'type' => 'element',
                                    'name' => 'script',
                                    'children' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'value' => 'var _gauges=_gauges||[];!function(){var e=document.createElement("script");e.async=!0,e.id="gauges-tracker",e.setAttribute("data-site-id","4f0dc9fef5a1f55508000013"),e.src="//secure.gaug.es/track.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}();',
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
