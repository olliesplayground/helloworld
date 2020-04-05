<?php


namespace OlliesPlayground\HelloWorld\Gesture;


use OlliesPlayground\HelloWorld\Internationalize\Translation;

class Expression
{
    /**
     * @var Translation
     */
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    /**
     * @param string|null $locale
     * @return string
     */
    public function sayHello(string $locale = null): string
    {
        return $this->translation->translate('hello.world', $locale);
    }
}
