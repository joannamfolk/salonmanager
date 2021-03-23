<?php

class DataLayer
{
    private $_dbh;

    // Constructor
    function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

    /* model/data-layer.php
     * returns data for salon management application
     */

    // ADMIN USERNAME AND PASSWORD
    function getAdminLogin()
    {
        // connect to the database
        require($_SERVER['DOCUMENT_ROOT']."/../config.php");

        // define
        $sql = "SELECT * FROM SM_admin WHERE admin_username = :admin_username AND admin_password = :admin_password";

        // prepare
        $statement = $this->_dbh->prepare($sql);

        // bind the parameters
        $statement->bindParam('admin_username', $_POST['username'], PDO::PARAM_STR);
        $statement->bindParam('admin_password', sha1($_POST['password']), PDO::PARAM_STR);

        // execute
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //echo print_r($result);
        return $result;
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
     * This function will save an added service into the database in SM_services table.
     */
    function saveService(){

        // Define query
        $sql = "INSERT INTO SM_services(service_name, service_description, service_price) 
                    VALUES (:service_name, :service_description, :service_price)";

        // Prepare the Statement
        $statement = $this->_dbh->prepare($sql);

        // Bind the parameters
        $serviceName = trim($_POST['service-name']);
        $serviceDescription = trim($_POST['service-description']);
        $servicePrice = trim($_POST['service-price']);


        $statement->bindParam(':service_name', $serviceName, PDO::PARAM_STR);
        $statement->bindParam(':service_description', $serviceDescription, PDO::PARAM_STR);
        $statement->bindParam(':service_price', $servicePrice, PDO::PARAM_STR);

        // execute statement
        $statement->execute();

        $id = $this->_dbh->lastInsertId();
        echo "<p>Service Added ID $id</p>";
    }

    /**
     * This function will save an added product into the database in SM_products table.
     */
    function saveProduct(){
        //var_dump($product);

        // Define query
        $sql = "INSERT INTO SM_products(product_name, product_description, product_size, product_price, product_category) 
                    VALUES (:product_name, :product_description, :product_size, :product_price, :product_category)";

        // Prepare the Statement
        $statement = $this->_dbh->prepare($sql);

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

        $id = $this->_dbh->lastInsertId();
        echo "<p>Product Added ID $id</p>";
    }

    /**
     * This function will query the database and select all products from the database.
     */
    function getProducts(){
        // define
        $sql = "SELECT * FROM SM_products";

        // prepare
        $statement = $this->_dbh->prepare($sql);

        // execute
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        /*
        foreach ($result as $row) {
            echo "<p>" . $row['product_name'] . ", " . $row['product_description'] . ", " . $row['product_size'] . ", "
                . $row['product_price'] . ", " . $row['product_category'] . "</p>";
        }
        */
        return $result;
    }

    /**
     * This function will query the database and select all products from the database.
     */
    function getServices(){
        // define
        $sql = "SELECT * FROM SM_services";

        // prepare
        $statement = $this->_dbh->prepare($sql);

        // execute
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function getStylish()
    {
        // define
        $sql = "SELECT * FROM SM_Stylists";

        // prepare
        $statement = $this->_dbh->prepare($sql);

        // execute
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //insert the stylist by adding in
    function insertStylist()
    {
        //Define the query
        $sql = "INSERT INTO SM_Stylists (stylist_first_name, stylist_last_name, stylist_about, stylist_skill, stylist_nickname, stylist_phone_number) 
                    VALUES (:stylist_first_name, :stylist_last_name, :stylist_about, :stylist_skill, :stylist_nickname, :stylist_phone_number)";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        $stylistFname = $_POST['stylistFirstName'];
        $stylistLname = $_POST['stylistLastName'];
        $stylistBio = $_POST['stylistBio'];
        $stylistSkill = $_POST['stylistSkill'];
        $stylistNickname = $_POST['stylistNickname'];
        $stylistPhone = $_POST['stylistPhone'];


        //Bind the parameters
        $statement->bindParam(':stylist_first_name', $stylistFname, PDO::PARAM_STR);
        $statement->bindParam(':stylist_last_name', $stylistLname, PDO::PARAM_STR);
        $statement->bindParam(':stylist_about', $stylistBio, PDO::PARAM_STR);
        $statement->bindParam(':stylist_skill', $stylistSkill, PDO::PARAM_STR);
        $statement->bindParam(':stylist_nickname', $stylistNickname, PDO::PARAM_STR);
        $statement->bindParam(':stylist_phone_number', $stylistPhone, PDO::PARAM_INT);

        //Execute
        $statement->execute();
        $id = $this->_dbh->lastInsertId();
        echo "<p> $id</p>";

    }
    function deleteStylist()
    {
        require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

        //DEFINE QUERY
        $sql = "SELECT * FROM SM_Stylists";
        //" WHERE stylist_first_name =:stylist_first_name and stylist_last_name = :stylist_last_name ";

        //PREPARE
        $statement = $dbh->prepare($sql);
        //set
//    $stylistFname = $_POST['stylistFirstName'];
//    $stylistLname = $_POST['stylistLastName'];

        //bind
//    $statement->bindParam(':stylist_first_name', $stylistFname, PDO::PARAM_STR);
//    $statement->bindParam(':stylist_last_name', $stylistLname, PDO::PARAM_STR);

        //execute
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($statement->rowCount() == 0) {

            echo "<h2>No result found</h2>";
        }
        else {
            $sql = "DELETE FROM SM_Stylists WHERE stylist_first_name =:stylist_first_name and stylist_last_name = :stylist_last_name ";

            //PREPARE
            $statement = $dbh->prepare($sql);
            //set
            $stylistFname = $_POST['stylistFirstName'];
            $stylistLname = $_POST['stylistLastName'];

            //bind
            $statement->bindParam(':stylist_first_name', $stylistFname, PDO::PARAM_STR);
            $statement->bindParam(':stylist_last_name', $stylistLname, PDO::PARAM_STR);

            //execute
            $statement->execute();

            //$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo "<h2>Stylist $stylistLname $stylistLname was successful remove</h2>";

        }
    }

    //update stylist info
    function updateStylist()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

        //DEFINE QUERY
//    $sql = "SELECT * FROM SM_Stylists WHERE (stylist_first_name = :stylist_first_name and stylist_last_name = :stylist_last_name) or
//stylist_phone_number =:stylist_phone_number";

        $sql = "SELECT * FROM SM_Stylists";
        //PREPARE
        $statement = $dbh->prepare($sql);
        //set
//    $stylistFname = $_POST['stylistFirstName'];
//    $stylistLname = $_POST['stylistLastName'];
//    $stylistBio = $_POST['stylistBio'];
//    $stylistSkill = $_POST['stylistSkill'];
//    $stylistNickname = $_POST['stylistNickname'];
//    $stylistPhone = $_POST['stylistPhone'];

        //bind
//    $statement->bindParam(':stylist_first_name', $stylistFname, PDO::PARAM_STR);
//    $statement->bindParam(':stylist_last_name', $stylistLname, PDO::PARAM_STR);
//    $statement->bindParam(':stylist_about', $stylistBio, PDO::PARAM_STR);
//    $statement->bindParam(':stylist_skill', $stylistSkill, PDO::PARAM_STR);
//    $statement->bindParam(':stylist_nickname', $stylistNickname, PDO::PARAM_STR);
//    $statement->bindParam(':stylist_phone_number', $stylistPhone, PDO::PARAM_INT);
        //execute
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($statement->rowCount() == 0) {

            echo "<h2>No result found</h2>";
        } else {
            $sql = "UPDATE SM_Stylists SET stylist_first_name =:stylist_first_name, stylist_last_name = :stylist_last_name,
        stylist_about = :stylist_about, stylist_skill = :stylist_skill, stylist_nickname = :stylist_nickname,
        stylist_phone_number =:stylist_phone_number WHERE stylist_first_name = :stylist_first_name and stylist_last_name = :stylist_last_name";
//        $sql = "UPDATE SM_Stylists SET stylist_first_name =:stylist_first_name, stylist_last_name = :stylist_last_name,
//        stylist_about = :stylist_about, stylist_skill = :stylist_skill, stylist_nickname = :stylist_nickname,
//        stylist_phone_number =:stylist_phone_number WHERE
//        stylist_phone_number =: stylist_phone_number";

            //PREPARE
            $statement = $dbh->prepare($sql);
            //set
            $stylistFname = $_POST['stylistFirstName'];
            $stylistLname = $_POST['stylistLastName'];
            $stylistBio = $_POST['stylistBio'];
            $stylistSkill = $_POST['stylistSkill'];
            $stylistNickname = $_POST['stylistNickname'];
            $stylistPhone = $_POST['stylistPhone'];
            //bind
            $statement->bindParam(':stylist_first_name', $stylistFname, PDO::PARAM_STR);
            $statement->bindParam(':stylist_last_name', $stylistLname, PDO::PARAM_STR);
            $statement->bindParam(':stylist_about', $stylistBio, PDO::PARAM_STR);
            $statement->bindParam(':stylist_skill', $stylistSkill, PDO::PARAM_STR);
            $statement->bindParam(':stylist_nickname', $stylistNickname, PDO::PARAM_STR);
            $statement->bindParam(':stylist_phone_number', $stylistPhone, PDO::PARAM_INT);
            //execute
            $statement->execute();

            //$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo "<h2> $stylistFname $stylistLname was update successful update</h2>";

        }
    }


    // Preferred Days
    function getPreferredDays()
    {
        return array("M-Wed", "Th-Fri", "Sat-Sun");
    }

    // Preferred Times
    function getPreferredTimes()
    {
        return array("Morning", "Afternoon", "Evening");
    }

    // Save Contacts - SQL
    function saveContact($contact)
    {

        // SQL Statement
        $sql = "INSERT INTO SM_contacts(name, phone, email, preferredDays, preferredTimes, comments)
	            VALUES(:name, :phone, :email, :preferredDays, :preferredTimes, :comments)";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Bind the parameters
        $statement->bindParam(':name', $contact->getName(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $contact->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $contact->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':preferredDays', $contact->getPreferredDays(), PDO::PARAM_STR);
        $statement->bindParam(':preferredTimes', $contact->getPreferredTimes(), PDO::PARAM_STR);
        $statement->bindParam(':comments', $contact->getComments(), PDO::PARAM_STR);

        //Execute
        $statement->execute();
        $id = $this->_dbh->lastInsertId();
    }

    // Get Contacts - SQL
    function getContacts()
    {
        //Define the query
        $sql = 'SELECT * FROM SM_contacts ORDER BY query DESC';

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Execute
        $statement->execute();

        //Get the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

}
