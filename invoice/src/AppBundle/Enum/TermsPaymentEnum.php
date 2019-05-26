<?php

namespace AppBundle\Enum;

class TermsPaymentEnum
{
    const TYPE_CASH = "Gotówka";
    const TYPE_CARD = "Karta";
    const TYPE_TRANSFER = "Przelew";

    const ID_TYPE_CASH = 1;
    const ID_TYPE_CARD = 2;
    const ID_TYPE_TRANSFER = 3;

    /** @var array user friendly named type */
    protected static $termsPaymentName = [
        self::ID_TYPE_CASH => self::TYPE_CASH,
        self::ID_TYPE_CARD => self::TYPE_CARD,
        self::ID_TYPE_TRANSFER => self::TYPE_TRANSFER
    ];

    /**
     * @param  string $typeShortName
     * @return string
     */
    public static function getTermsPaymentName($idTermPayment)
    {
        if (!isset(static::$termsPaymentName[$idTermPayment])) {
            return "Unknown type ($idTermPayment)";
        }

        return static::$termsPaymentName[$idTermPayment];
    }

    public static function getAllTermsPayment()
    {
        return static::$termsPaymentName;
    }

}