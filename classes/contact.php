<?php

/**
 * Class Contact - allows for us to log appointment
 * preferences & reach out to customer if we have openings
 */

class Order
{

    // Encapsulated Contact Vars
    private $_name;
    private $_phone;
    private $_email;
    private $_preferredDays;
    private $_preferredTimes;
    private $_comments;

    /**
     * Getters & Setters
     */

    // Name
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name): void
    {
        $this->_name = $name;
    }

    // Phone
    public function getPhone()
    {
        return $this->_phone;
    }

    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    // Email
    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    // Preferred Days
    public function getPreferredDays()
    {
        return $this->_preferredDays;
    }

    public function setPreferredDays($preferredDays)
    {
        $this->_preferredDays = $preferredDays;
    }

    // Preferred Times
    public function getPreferredTimes()
    {
        return $this->_preferredTimes;
    }

    public function setPreferredTimes($preferredTimes)
    {
        $this->_preferredTimes = $preferredTimes;
    }

    // Comments
    public function getComments()
    {
        return $this->_comments;
    }

    public function setComments($comments)
    {
        $this->_comments = $comments;
    }



}