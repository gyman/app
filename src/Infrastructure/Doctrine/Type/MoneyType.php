<?php

declare(strict_types=1);

namespace Gyman\Infrastructure\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Money\Money;
use function Gyman\money2string;
use function Gyman\string2money;

class MoneyType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'CHAR(255)';
    }

    /**
     * @param Money            $value
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return money2string($value);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Money
    {
        if (null === $value) {
            return null;
        }

        return string2money($value);
    }

    public function getName()
    {
        return 'money';
    }
}
