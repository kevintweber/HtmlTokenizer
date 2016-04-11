<?php

namespace Kevintweber\HtmlTokenizer;

use Symfony\Component\OptionsResolver\OptionsResolver;

class HtmlTokenizer
{
    /** @var array */
    private $options;

    /** @var array[Token] */
    private $tokens;

    /**
     * Constructor
     */
    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    public function parse($html)
    {
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
    }
}
