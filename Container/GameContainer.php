<?php
namespace Container;

use Factory\CardFactory;
use Factory\PlayerFactory;
use Service\WarService;

/**
 * Conteneur de jeu
 */
class GameContainer
{
    /**
     * Retourne le générateur de joueurs
     * @return PlayerFactory
     */
    public static function getPlayerFactory():PlayerFactory {
        return new PlayerFactory();
    }

    /**
     * Retourne le générateur de cartes
     * @return CardFactory
     */
    public static function getCardFactory():CardFactory {
        return new CardFactory();
    }

    /**
     * Retourne le jeu de la bataille
     * @return WarService
     */
    public static function getWarService():WarService {
        return new WarService();
    }
}
