<?php
namespace Factory;

use Model\PlayerModel;

/**
 * Générateur de joueurs
 */
class PlayerFactory {

    const DEFAULT_NAME = 'Player';

    /**
     * Création d'un joueur
     * @param string $name Nom du joueur
     * @return PlayerModel
     */
    public static function createSinglePlayer(string $name):PlayerModel {
        return new PlayerModel($name);
    }

    /**
     * @param int $count Nombre de joueurs à créer
     * @param string $names Nom des joueurs
     * @return array
     */
    public static function createPlayers(int $count, string ...$names):array {
        $players = [];
        for($i = 1; $i <= $count;$i++)
            $players[] = self::createSinglePlayer(($names[$i-1]??self::DEFAULT_NAME.' '.$i));
        return $players;
    }
}