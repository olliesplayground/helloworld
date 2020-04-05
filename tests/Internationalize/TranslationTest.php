<?php


namespace OlliesPlayground\HelloWorld\Test\Internationalize;


use Mockery;
use OlliesPlayground\HelloWorld\Internationalize\Translation;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Translator;

class TranslationTest extends TestCase
{
    private $translationsDir = __DIR__.'/../data/translations';

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var Translation
     */
    private $translation;

    protected function setUp(): void
    {
        parent::setUp();

        $this->translator = $this->createMock(Translator::class);

        $this->translation = new Translation($this->translationsDir, 'en', $this->translator);
    }

    public function testAddLocale(): void
    {
        $this->translator->expects($this->once())
            ->method('addResource')
            ->with(
                $this->equalTo('php'),
                $this->equalTo($this->translationsDir . '/messages.de.php'),
                $this->equalTo('de')
            );

        $this->translation->addLocale('de');
    }

    public function testTranslate(): void
    {
        $messageId = 'this.is.a.test';

        $this->translator->expects($this->once())
            ->method('setLocale')
            ->with(
                $this->equalTo('de')
            );

        $this->translator->expects($this->once())
            ->method('trans')
            ->with(
                $this->equalTo($messageId)
            )
            ->willReturn('This is a test');

        $message = $this->translation->translate($messageId, 'de');

        $this->assertEquals('This is a test', $message);
    }
}
