<?php

// Will see internal error - no root somethingerother error in browser

// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

// start session
session_start();

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validate.php');
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

// Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

// HOME ROUTE
$f3 -> route('GET /', function() {
    //echo "<h1>Hello, world</h1>";
    session_destroy(); // destroy any session data on home page
    $view = new Template();
    echo $view -> render('views/home.html');
});

// APPOINTMENT ROUTE
$f3->route('GET /appointment', function() {

    $view = new Template();
    echo $view->render('views/appointment.html');
});

// SERVICES ROUTE
$f3->route('GET /services', function($f3) {
    $f3->set('services', getServices());
    $view = new Template();
    echo $view->render('views/services.html');
});

// STYLIST ROUTE
$f3->route('GET|POST /stylist', function($f3) {

    $f3->set('stylists', getStylist());
    $view = new Template();
    echo $view->render('views/stylist.html');
});

// PRODUCTS ROUTE
$f3->route('GET /products', function($f3) {

    $f3->set('products', getProducts());

    $view = new Template();
    echo $view->render('views/products.html');
});

// CONTACT ROUTE
$f3->route('GET /contact', function() {

    $view = new Template();
    echo $view->render('views/contact.html');
});

// LOGIN ROUTE
$f3->route('GET|POST /login', function($f3) {
    // Route Hive
    $adminLogin = getAdminUsername();
    $userLogin = $_POST['username'];

    $adminPassword = getAdminPassword();
    $userPassword = $_POST['password'];

    if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {
        if($userLogin == $adminLogin && $userPassword == $adminPassword){
            $_SESSION['valid'] = true;
            $_SESSION['username'] = $adminLogin;
            $f3->reroute('views/admin.html');
        } else{
            echo "INVALID";
        }
    }

    $view = new Template();
    echo $view->render('views/login.html');
});

// ADMIN ROUTE
$f3->route('GET|POST /admin', function() {

    $view = new Template();
    echo $view->render('views/admin.html');
});

// ADMIN - ADD PRODUCT
$f3->route('GET|POST /admin-add-product', function($f3) {

    getProducts();
    var_dump($_POST);
    // get data from post array and trim the values
    $productName = trim($_POST['product-name']);
    $productDescription = trim($_POST['product-description']);
    $productSize = trim($_POST['product-size']);
    $productPrice = trim($_POST['product-price']);
    $productCategory = trim($_POST['product-category']);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Validate and set error messages
        if(validProduct($productName)){
            $_SESSION['product_name'] = $productName;
        } else {
            $f3-> set('errors["productname"]', "Product Name Required - Alphabetic Characters Only");
        } // PRODUCT NAME

        if(validDescription($productDescription)){
            $_SESSION['product_description'] = $productDescription;
        } else {
            $f3-> set('errors["productdescription"]', "Please fill out description for product");
        } // PRODUCT DESCRIPTION

        if(isset($productSize)){
            $_SESSION['product_size'] = $productSize;
        } else {
            $f3-> set('errors["productsize"]', "Size Measurement Required");
        } // PRODUCT SIZE

        if(validPrice($productPrice)){
            $_SESSION['product_price'] = $productPrice;
        } else {
            $f3-> set('errors["productprice"]', "Enter price");
        } // PRODUCT PRICE

        if(isset($productCategory)){
            $_SESSION['product_category'] = $productCategory;
        } else {
            $f3-> set('errors["productcategory"]', "Select a category");
        } // PRODUCT CATEGORY

        // if no errors - save product to database
        if(empty($f3->get('errors'))){
            saveProduct();
            //var_dump();
        }
    }
    $f3->set('products', getProducts());

    $view = new Template();
    echo $view->render('views/admin-add-product.php');
});

//add and query stylist
$f3->route('GET|POST /admin-add-stylist', function ($f3){
    getStylish();
    var_dump($_POST);
    //get data from post array
    $stylistFname = trim($_POST['stylistFirstName']);
    $stylistLname = trim($_POST['stylistLastName']);
    $stylistBio = trim($_POST['stylistBio']);
    $stylistSkill = trim($_POST['stylistSkill']);
    $stylistNickname = trim($_POST['stylistNickname']);
    $stylistPhone = trim($_POST['stylistPhone']);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Validate and set error messages
        if (validName($stylistFname)) {
            $_SESSION['stylist_fname'] = $stylistFname;
        }
        else {
            $f3-> set('errors["fname"]', "Stylist Name is Require - Alphabetic Characters Only");
        }


        if (validName($stylistLname)) {
            $_SESSION['stylist_lname'] = $stylistLname;
        }
        else {
            $f3-> set('errors["lname"]', "Stylist Name is Require - Alphabetic Characters Only");
        }


        if(validBio($stylistBio)){
            $_SESSION['stylist_bio'] = $stylistBio;
        } else {
            $f3-> set('errors["bio"]', "Please fill out bio for stylist");
        }

        if(validSkill($stylistSkill)){
            $_SESSION['stylist_skill'] = $stylistSkill;
        } else {
            $f3-> set('errors["skill"]', "Please fill out skill for stylist");
        }

        if(validNickname($stylistNickname)){
            $_SESSION['stylist_nickname'] = $stylistNickname;
        } else {
            $f3-> set('errors["nickname"]', "Please fill out nickname for stylist");
        }

        if(validPhone($stylistPhone)){
            $_SESSION['stylist_phone'] = $stylistPhone;
        } else {
            $f3-> set('errors["phone"]', "Phone is require and 10 digit long");
        }

        // if no errors - save product to database
        if(empty($f3->get('errors'))){
            insertStylist();
            //var_dump();
        }
    }
    $f3->set('stylists', getStylish());

    $view = new Template();
    echo $view->render('views/admin-add-stylist.php');

});

//  Run fat free - has to be the last thing in the file
$f3->run();
