<?php
namespace Model;

use Interfaces\CardInterface;
use Interfaces\PlayerInterface;

/**
 * Modèle de joueur
 */
class PlayerModel implements PlayerInterface {
    /**
     * @var string Nom du joueur
     */
    private string $_name = '';
    /**
     * @var CardInterface[] Cartes détenues par le joueur
     */
    private array $_cards = [];
    /**
     * @var float Points du joueur au cours d'une partie
     */
    private float $_points = 0;

    /**
     * @param string $name Nom du joueur
     * @return $this
     */
    public function __construct(string $name) {
        return $this->setName($name);
    }

    /**
     * @param string $name
     * @return $this
     */
    public final function setName(string $name):self {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public final function getName(): string
    {
        return $this->_name;
    }

    /**
     * @return CardInterface[]
     */
    public final function getCards(): array
    {
        return $this->_cards;
    }

    /**
     * Ajoute une carte sur le tas de cartes du joueur
     * @param CardInterface $card
     * @return $this
     */
    public final function addCard(CardInterface $card):self {
        $cards = $this->getCards();
        array_unshift($cards,$card);
        $this->setCards($cards);
        return $this;
    }

    /**
     * Récupère la première carte du tas du joueur, en l'enlevant du tas
     * @return CardInterface|null
     */
    public final function takeCard():?CardInterface{
        $cards = $this->getCards();
        $first_card = array_shift($cards);
        $this->setCards($cards);
        return $first_card;
    }

    /**
     * @param CardInterface[] $cards
     */
    private function setCards(array $cards):void {
        $this->_cards = $cards;
    }

    /**
     * @param float $points
     * @return $this
     */
    public final function addPoints( float $points):self {
        $this->_points += $points;
        return $this;
    }

    /**
     * @return float
     */
    public final function getPoints(): float
    {
        return $this->_points;
    }
}