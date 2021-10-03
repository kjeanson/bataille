<?php
namespace Interfaces;
/**
 * Interface d'une carte
 */
interface  CardInterface {

    /**
     * @return int Retourne la valeur de la carte
     */
    public function getValue() :int;

    /**
     * @return string Retourne le visuel de la carte
     */
    public function getVisual() :string;

    /**
     * Set la valeur d'une carte
     * @param int $value valeur de la carte
     * @return self
     */
    public function setValue(int $value) :self;

    /**
     * Set le visuel d'une carte
     * @param string $visuel visuel de la carte
     * @return self
     */
    public function setVisual(string $visuel) :self;
}