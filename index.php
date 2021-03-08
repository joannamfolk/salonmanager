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
$f3->route('GET /services', function() {

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
$f3->route('GET /products', function() {

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
    var_dump($_SESSION['product']);
    // get data from post array and trim the values
    $productName = trim($_POST['product-name']);
    $productDescription = trim($_POST['product-description']);
    $productSize = trim($_POST['product-size']);
    $productPrice = trim($_POST['product-price']);
    $productCategory = trim($_POST['product-category']);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product = $_SESSION['product'];
        // Validate and set error messages
        if(validProduct($productName)){
            $_SESSION['product'] = $productName;
        } else {
            $f3-> set('errors["productname"]', "Product Name Required - Alphabetic Characters Only");
        } // PRODUCT NAME

        if(validDescription($productDescription)){
            $_SESSION['product'] = $productDescription;
        } else {
            $f3-> set('errors["productdescription"]', "Please fill out description for product");
        } // PRODUCT DESCRIPTION

        if(isset($productSize)){
            $_SESSION['product'] = $productSize;
        } else {
            $f3-> set('errors["productsize"]', "Size Measurement Required");
        } // PRODUCT SIZE

        if(validPrice($productPrice)){
            $_SESSION['product'] = $productPrice;
        } else {
            $f3-> set('errors["productprice"]', "Enter price");
        } // PRODUCT PRICE

        if(isset($productCategory)){
            $_SESSION['product'] = $productCategory;
        } else {
            $f3-> set('errors["productcategory"]', "Select a category");
        } // PRODUCT CATEGORY
        var_dump($_SESSION['product']);
        // if no errors - save product to database
        if(empty($f3->get('errors'))){
            saveProduct($_SESSION['product']);
            var_dump($_SESSION['product']);

        }
    }

    $view = new Template();
    echo $view->render('views/admin-add-product.php');
});

//  Run fat free - has to be the last thing in the file
$f3->run();
