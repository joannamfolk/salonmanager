<?php
/* model/data-layer.php
 * returns data for salon management application
 * */

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

/**
 * This function will save an added product into the database in SM_products table.
 * @param $product array of product values to be entered into database
 *
 */
function saveProduct($product){
    var_dump($product);

    // Define query
    $sql = "INSERT INTO SM_products(product_name, product_description, product_size, product_price, product_category) 
	            VALUES (:product_name, :product_description, :product_size, :product_price, :product_category)";

    // Prepare the Statement
    $statement = $dbh->prepare($sql);

    // Bind the parameters
    $productName = trim($_POST['product-name']);
    $productDescription = trim($_POST['product-description']);
    $productSize = trim($_POST['product-size']);
    $productPrice = trim($_POST['product-price']);
    $productCategory = trim($_POST['product-category']);

    $statement->bindParam(':product_name', $productName, PDO::PARAM_STR);
    $statement->bindParam(':product_description', $productDescription, PDO::PARAM_STR);
    $statement->bindParam(':product_size', $productSize, PDO::PARAM_STR);
    $statement->bindParam(':product_price', $productPrice, PDO::PARAM_STR);
    $statement->bindParam(':product_category', $productCategory, PDO::PARAM_STR);

    // execute statement
    $statement->execute();

    $id = $dbh->lastInsertId();
    echo "<p>Product Added ID $id</p>";
}
