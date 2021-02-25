<?php
/**
 * Function that returns username for admin login
 */
function getAdminUsername()
{
    // temporary default username
    return "admin";
}

/**
 * Function that returns password
 */
function getAdminPassword()
{
    // temporary default password
    return "password";
}

/**
 * @return string[][] function return stylist name, bio, skills, nicknames, and the path to their img asscociate
 */
function getStylist()
{
    return array(
        //name                    //bio                 //skill    //nickname      //path to img
        "Carlos Tevez" => array("Lorem ifsum anffhf", "undercut", "chopper", "images/stylist-01-vert.png"),
        "Carol Inman" => array( "Lorem ifsum anffhf", "fade", "faded","images/stylist-02-vert.png"),
        "Shawn McGuire" => array( "Lorem ifsum anffhf", "shave", "shaver","images/stylist-03-vert.png"),
        "Kevin DeBruhne" => array( "Lorem ifsum anffhf", "bucherman", "bucherman","images/stylist-04-vert.png"),
        "Cindy Taylor" => array( "Lorem ifsum anffhf", "groom", "grom","images/stylist-05-vert.png"),
        "Tiffany Tran" => array( "Lorem ifsum anffhf", "comedy", "joker","images/stylist-06-vert.png")
    ) ;
}
