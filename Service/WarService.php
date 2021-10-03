<?php
namespace Service;

use Interfaces\CardInterface;
use Interfaces\PlayerInterface;

/**
 * Classe du Jeu de la bataille
 * 52 cartes
 * 2 joueurs
 */
class WarService
{
    const NB_CARDS = 52;
    const NB_PLAYERS = 2;
    const POINTS_PER_TURN = 1;

    /**
     * @var PlayerInterface[]|null
     */
    private array $_players;
    /**
     * @var CardInterface[]|null
     */
    private array $_cards;

    /**
     * @param PlayerInterface[] $players
     * @param CardInterface[] $cards
     */
    public function __construct(array $players = null, array $cards = null) {
        if(is_array($players))
            $this->setPlayers($players);
        if(is_array($cards))
            $this->setCards($cards);
    }

    /**
     * @param PlayerInterface[] $players
     */
    public final function setPlayers(array $players):self {
        $this->_players = $players;
        return $this;
    }

    /**
     * @param CardInterface[] $cards
     */
    public final function setCards(array $cards):self {
        $this->_cards = $cards;
        return $this;
    }

    /**
     * Mélange le tas de cartes
     * @return bool
     */
    public final function shuffle():bool {
        return shuffle($this->_cards);
    }

    /**
     * Distribue le tas de cartes aux joueurs
     */
    public final function distribute():void {
        while ($card = array_shift($this->_cards)) {
            $next_player = next($this->_players)?:reset($this->_players);
            $next_player->addCard($card);
        }
    }

    /**
     * Jeu de bataille : chaque joueur pose une carte sur la table, le joueur ayant la meilleure emporte un point
     */
    public final function play():void {
        //Tant que le premier joueur a des cartes
        while(sizeof($this->_players[0]->getCards())) {
            $best_card_player = ['card' => null, 'player' => null];
            //Pour chaque joueur, on retourne une carte et on la compare à la meilleure carte des autres
            foreach ($this->_players as $player) {
                $current_card_player = $player->takeCard();
                //Si c'est la meilleure carte, le joueur devient le meilleur pour ce tour
                if(!$best_card_player['card'] instanceof CardInterface || $best_card_player['card']->getValue() < $current_card_player->getValue()) {
                    $best_card_player['card'] = $current_card_player;
                    $best_card_player['player'] = $player;
                }
            }
            //Ajout des points au joueur ayant eu la meilleure carte pour ce tour
            if($best_card_player['player'] instanceof PlayerInterface)
                $best_card_player['player']->addPoints(self::POINTS_PER_TURN);
        }
    }

    /**
     * @return PlayerInterface[] Joueur(s) ayant le plus de points
     */
    public final function getWinners():array {
        $array_players_points = [];
        foreach ($this->_players as $player) {
            $array_players_points[$player->getPoints()][] = $player;
        }
        krsort($array_players_points);
        return $array_players_points[array_keys($array_players_points)[0]];
    }

    /**
     * @return PlayerInterface[]
     */
    public final function getPlayers():array {
        return $this->_players;
    }
}