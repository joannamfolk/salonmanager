<?php

/**
 * Class Order - A class that allows individuals to pre-pay for their products
 * Then pick them up when they arrive at the salon
 */

class Order
{

    // Checkout basics
    private $_item;
    private $_name;
    private $_card;

    // Setters/Getters

    // Item
    public function getItem()
    {
        return $this->_item;
    }

    public function setItem($item): void
    {
        $this->_item = $item;
    }

    // Name
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name): void
    {
        $this->_name = $name;
    }

    // Card #
    public function getCard()
    {
        return $this->_card;
    }

    public function setCard($card): void
    {
        $this->_card = $card;
    }

}