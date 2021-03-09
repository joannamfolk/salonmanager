<?php
/* model/data-layer.php
 * returns data for salon management application
 * */
//require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

// Testing 1, 2, 3...

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
    require $_SERVER['DOCUMENT_ROOT'].'/../config.php';
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

    $statement->bindParam(':product_name', $product[$productName], PDO::PARAM_STR);
    $statement->bindParam(':product_description', $product[$productDescription], PDO::PARAM_STR);
    $statement->bindParam(':product_size', $product[$productSize], PDO::PARAM_STR);
    $statement->bindParam(':product_price', $product[$productPrice], PDO::PARAM_STR);
    $statement->bindParam(':product_category', $product[$productCategory], PDO::PARAM_STR);

    echo "$product";

    // execute statement
    $statement->execute();

    $id = $dbh->lastInsertId();
    echo "<p>Product Added ID $id</p>";
}

/**
 * This function will query the database and select all products from the database.
 */
function getProducts(){
    require $_SERVER['DOCUMENT_ROOT'].'/../config.php';
    // define
    $sql = "SELECT * FROM SM_products";

    // prepare
    $statement = $dbh->prepare($sql);

    // execute
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<p>" . $row['product_name'] . ", " . $row['product_description'] . ", " . $row['product_size'] . ", "
            . $row['product_price'] . ", " . $row['product_category'] . "</p>";
    }
}
