<?php
/*
 * SDEV 328
 * model/validate/php
 *
 * this file contains validation functions for salon management data
 * **/

class Validate
{
    private $_dataLayer;

    function __construct($dataLayer)
    {
        $this->_dataLayer = $dataLayer;
    }

    /**
     * This function will check if the product name entry is valid.
     * @param productName the product being checked for validation
     * @return boolean is the product valid.
     */
    function validProduct($productName)
    {
        return !empty($productName);
    }

    /**
     * This function will check if the description test area is not left empty
     * @param productName the product being checked for validation
     * @return boolean is the product valid.
     */
    function validDescription($description)
    {
        return !empty($description);
    }

    /**
     * This function will check the price is not empty and a valid float/decimal/ money format 0.00
     * @param productName the product being checked for validation
     * @return boolean is the product valid.
     */
    function validPrice($price)
    {
        return !empty($price);
    }

    /**
     * @param $name name of stylist is validate before enter
     * @return boolean is the name of stylist is valid
     */
    function validName($name)
    {
        return !empty($name) && ctype_alpha($name);
    }

    /**
     * @param $phone phone number is check
     * @return bool is the phone number valid and match format
     */
    function validPhone($phone)
    {
        return !empty($phone) && preg_match("/^\d{10}$/", $phone);
    }

    // Validate Email
    function validEmail($email)
    {
        // Checks if valid email
        return !empty($email)
            && (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * @param $bio
     * @return bool
     */
    function validBio($bio)
    {
        //return !empty($bio) && preg_match("/.{2,60}$/", $bio);
        return !empty($bio);
    }

    function validSkill($skill)
    {
        return preg_match("/.{2,60}$/", $skill) && !empty($skill);
    }

    function validNickname($nickname)
    {
        return preg_match("/.{2,60}$/", $nickname);
    }

    // Validate Preferred Times
    function validPreferredTimes($preferredTimes): bool
    {
        $validPreferredTimes = $this->_dataLayer->getPreferredTimes();

        foreach ($preferredTimes as $time) {
            if (!in_array($time, $validPreferredTimes)) {
                return false;
            }
        }
        return true;
    }

    // Validate Preferred Days
    function validPreferredDays($preferredDays): bool
    {
        $validPreferredDays = $this->_dataLayer->getPreferredDays();

        foreach ($preferredDays as $day) {
            if (!in_array($day, $validPreferredDays)) {
                return false;
            }
        }
        return true;
    }

}