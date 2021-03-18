<?php

/**
 * Class Order - A class that allows individuals to pre-pay for their products
 * Then pick them up when they arrive at the salon
 */

class Order
{

    // Checkout basics
    private $_items;
    private $_name;
    private $_card;

    // Setters/Getters
    public function getItems()
    {
        return $this->_items;
    }

    public function setItems($items): void
    {
        $this->_item = $items;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name): void
    {
        $this->_name = $name;
    }

    public function getCard()
    {
        return $this->_card;
    }

    public function setCard($card): void
    {
        $this->_card = $card;
    }

}