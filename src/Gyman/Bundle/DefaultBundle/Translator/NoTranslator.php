<?php
namespace Gyman\Bundle\DefaultBundle\Translator;

use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\TranslatorBagInterface;
use Symfony\Component\Translation\TranslatorInterface;

class NoTranslator implements TranslatorInterface, TranslatorBagInterface
{
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        return $id;
    }

    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        return $id;
    }

    public function setLocale($locale)
    {
    }

    public function getLocale()
    {
        return '--';
    }

    public function setFallbackLocales($locale)
    {
    }

    public function addResource($resource)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getCatalogue($locale = null)
    {
        return new MessageCatalogue($locale, []);
    }
}
