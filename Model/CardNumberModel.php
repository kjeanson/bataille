<?php
namespace Model;

use Interfaces\CardInterface;

/**
 * Modèle d'une carte numérique où la valeur est égale au visuel (pas de tête)
 */
class CardNumberModel implements CardInterface {
    public int $_value;
    public string $_visuel;

    public function __construct(int $value) {
        $this->setValue($value);
        $this->setVisual((string) $value);
    }

    /**
     * @return int
     */
    public final function getValue(): int
    {
        return $this->_value;
    }

    /**
     * @return string
     */
    public final function getVisual(): string
    {
        return $this->_visuel;
    }

    /**
     * @param int $value
     * @return $this
     */
    public final function setValue(int $value):self
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * @param string $visuel
     * @return $this
     */
    public final function setVisual(string $visuel):self
    {
        $this->_visuel = $visuel;
        return $this;
    }
}