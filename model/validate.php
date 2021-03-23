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
     * This function will check if the product name entry is valid.
     * @param productName the product being checked for validation
     * @return boolean is the product valid.
     */
    function validService($serviceName)
    {
        return !empty($serviceName);
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
        $name=str_replace(" ", "", $name);
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

    /**
     * @param $email Validate Email
     * @return bool
     */
    function validEmail($email)
    {
        // Checks if valid email
        return !empty($email)
            && (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * @param $text
     * @return bool
     */
    function validText ($text)
    {
        return !empty($text) && preg_match("/^[ A-Za-z\\s-!,.'?;:]*$/", $text);
        //return  !empty($bio);
    }


    /**
     * @param $preferredTimes Validate Preferred Times for Apt
     * @return bool
     */
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

    /**
     * @param $preferredDays Validate Preferred Days
     * @return bool
     */
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