<?php
/**
 * Function that returns username for admin login
 */
function getAdminUsername(){
    // temporary default username
    return "admin";
}

/**
 * Function that returns password
 */
function getAdminPassword(){
    // temporary default password
    return "password";
}

/*
 *  Titles for product cards
 */
function getProductTitles()
{
    $titles = array("Trooly Clean: Hand Soap", "Coco Smooth: All Natural Body Lotion", "Botavikos Shampoo & Conditioner", "Bergamot & Mint Pomade","Rosie Essence Miracle Serum");
    return $titles;
}

/*
 *  Images for product cards
 */
function getProductImages()
{
    $images = array("images/product-handsoap.png", "images/product-creamalt.png", "images/product-shampoobottles.png", "images/product-pomade.png","images/product-serum.png");
    return $images;
}

/*
 *  Descriptions for product cards
 */
function getProductDescriptions()
{
    $descriptions = array("Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "Mauris id neque vitae tellus dictum accumsan.",
        "In elementum lectus vestibulum lacus faucibus vulputate.",
        "Nullam blandit ex a magna cursus, in faucibus erat condimentum.",
        "Sed ac nulla aliquet, tempor neque consequat, dapibus libero.");
    return $descriptions;
}

/**
 * Item value
 */

function getProductValue()
{
    $value = array(0,1,2,3,4,5);
    return $value;
}