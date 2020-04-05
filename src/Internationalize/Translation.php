<?php

namespace OlliesPlayground\HelloWorld\Internationalize;

use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\PhpFileLoader;

class Translation
{
    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var string
     */
    private $translationsDir;

    /**
     * @var string
     */
    private $defaultLocale;

    /**
     * @var array
     */
    private $locales = [];

    /**
     * Factory Method
     * @param string $translationsDir
     * @param string $defaultLocale
     * @return Translation
     */
    public static function createWithPhpLoader(string $translationsDir, string $defaultLocale): Translation
    {
        $translator = new Translator($defaultLocale);

        $translator->addLoader('php', new PhpFileLoader());

        return new Translation($translationsDir, $defaultLocale, $translator);
    }

    /**
     * Translation constructor.
     * @param string $translationsDir
     * @param string $defaultLocale
     * @param Translator $translator
     */
    public function __construct(string $translationsDir, string $defaultLocale, Translator $translator)
    {
        $this->translationsDir = $translationsDir;

        $this->defaultLocale = $defaultLocale;

        $this->translator = $translator;
    }


    /**
     * @param string $locale
     */
    public function addLocale(string $locale): void
    {
        if (in_array($locale, $this->locales, true)) {
            return;
        }

        $this->translator->addResource(
            'php',
            "{$this->translationsDir}/messages.{$locale}.php",
            $locale
        );
    }

    /**
     * @param string $messageId
     * @param string|null $locale
     * @return string
     */
    public function translate(string $messageId, string $locale = null): string
    {
        $locale = $locale ?? $this->defaultLocale;

        $this->addLocale($locale);
        $this->translator->setLocale($locale);

        return $this->translator->trans($messageId);
    }
}
