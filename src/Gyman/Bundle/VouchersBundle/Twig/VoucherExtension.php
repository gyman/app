<?php
namespace Gyman\Bundle\VouchersBundle\Twig;

use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Translation\TranslatorInterface;

class VoucherExtension extends \Twig_Extension
{
    /**
     * @var Translator
     */
    private $translator;

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('entries_label', [$this, 'entriesLabelFilter']),
        ];
    }

    public function entriesLabelFilter(Voucher $voucher)
    {
        if ($voucher->getAmount() == 0) {
            return $this->translator->trans('voucher.entries.open');
        } else {
            return sprintf('%d/%d', $voucher->getAmountLeft(), $voucher->getAmount());
        }
    }

    public function getName()
    {
        return 'voucher_extension';
    }

    /**
     * @param Translator $translator
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
}
