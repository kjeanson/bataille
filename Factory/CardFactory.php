<?php
namespace Factory;

use Model\CardNumberModel;

/**
 * Gestionnaire de cartes
 */
class CardFactory {
    /**
     * Créateur d'une carte numérique
     * @param int $value
     * @return CardNumberModel
     */
    public static function createSingleCardNumber(int $value):CardNumberModel {
        return new CardNumberModel($value);
    }

    /**
     * @param int $count Nombre de cartes à créer
     * @return CardNumberModel[]
     */
    public static function createCardsNumber(int $count):array {
        $cards = [];
        for($i = 1; $i<=$count; $i++)
            $cards[] = self::createSingleCardNumber($i);
        return $cards;
    }
}