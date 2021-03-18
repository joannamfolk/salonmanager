<?php

/**
 * Class Contact - allows for us to log appointment
 * preferences & reach out to customer if we have openings
 */

class Order
{

    // Contact basics
    private $_name;
    private $_phone;
    private $_email;
    private $_preferedDays;
    private $_preferedTimes;

    // Getters/Setters
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name): void
    {
        $this->_name = $name;
    }

    public function getPhone()
    {
        return $this->_phone;
    }

    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getPreferedDays()
    {
        return $this->_preferedDays;
    }

    public function setPreferedDays($preferedDays)
    {
        $this->_preferedDays = $preferedDays;
    }

    public function getPreferedTimes()
    {
        return $this->_preferedTimes;
    }

    public function setPreferedTimes($preferedTimes)
    {
        $this->_preferedTimes = $preferedTimes;
    }

}