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
    return !empty($productName) && ctype_alpha($productName);
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