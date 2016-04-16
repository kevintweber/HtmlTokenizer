<?php

namespace Kevintweber\HtmlTokenizer;

use Kevintweber\HtmlTokenizer\Tokens\TokenCollection;
use Kevintweber\HtmlTokenizer\Tokens\TokenFactory;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HtmlTokenizer
{
    /** @var array */
    private $options;

    /**
     * Constructor
     */
    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    /**
     * Will parse html into tokens.
     *
     * @param $html string The HTML to tokenize.
     *
     * @return TokenCollection
     */
    public function parse($html)
    {
        $tokens = new TokenCollection();
        $remainingHtml = trim((string) $html);
        while (strlen($remainingHtml) > 0) {
            $token = TokenFactory::buildFromHtml(
                $remainingHtml,
                null,
                $this->options['throwOnError']
            );
            if ($token === false) {
                // Error has occurred, so we stop.
                break;
            }

            $remainingHtml = trim($token->parse($remainingHtml));
            $tokens[] = $token;
        }

        return $tokens;
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'throwOnError' => false
        ));
    }
}
