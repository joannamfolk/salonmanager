<?php
/*
 * SDEV 328
 * model/validate/php
 *
 * this file contains validation functions for salon management data
 * **/

/**
 * This function will check if the product name entry is valid.
 * @param productName the product being checked for validation
 * @return boolean is the product valid.
 */
function validProduct($productName){
    return !empty($productName);
}

/**
 * This function will check if the description test area is not left empty
 * @param productName the product being checked for validation
 * @return boolean is the product valid.
 */
function validDescription($description){
    return !empty($description);
}

/**
 * This function will check the price is not empty and a valid float/decimal/ money format 0.00
 * @param productName the product being checked for validation
 * @return boolean is the product valid.
 */
function validPrice($price){
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

/**
 * @param $bio
 * @return bool
 */
function validBio ($bio){
    //return !empty($bio) && preg_match("/.{2,60}$/", $bio);
    return  !empty($bio);
}

function validSkill ($skill){
    return preg_match("/.{2,60}$/", $skill) && !empty($skill);
}

function validNickname ($nickname){
    return preg_match("/.{2,60}$/", $nickname);
}
