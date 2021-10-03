<?php
namespace Interfaces;

/**
 * Interface d'un joueur
 */
interface PlayerInterface
{
    /**
     * @return string
     */
    public function getName():string;

    /**
     * @return float
     */
    public function getPoints():float;

    /**
     * @return CardInterface[]
     */
    public function getCards():array;

    /**
     * @param CardInterface $card
     * @return self
     */
    public function addCard(CardInterface $card):self;

    /**
     * @return CardInterface
     */
    public function takeCard():?CardInterface;

    /**
     * @param float $points
     * @return self
     */
    public function addPoints(float $points):self;
}