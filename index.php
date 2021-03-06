<?php
// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

// start session - For shopping/form stickies
session_start();

// Require the autoload file
require_once('vendor/autoload.php');
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';
require_once('model/data-layer.php');
require_once('model/validate.php');

// Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);
$dataLayer = new DataLayer($dbh);
$validator = new Validate($dataLayer);

$contact = new Contact();
$order = new Order();
$controller = new Controller($f3);


// HOME ROUTE
$f3 -> route('GET /', function() {

    // Controller - Home
    global $controller;
    $controller->home();
});

// APPOINTMENT ROUTE
$f3->route('GET /appointment', function() {

    // Controller - Appointment
    global $controller;
    $controller->appointment();
});

// SERVICES ROUTE
$f3->route('GET /services', function() {

    // Controller - Services
    global $controller;
    $controller->services();
});

// STYLIST ROUTE
$f3->route('GET|POST /stylist', function() {

    // Controller - Stylists
    global $controller;
    $controller->stylists();
});

// PRODUCTS ROUTE
$f3->route('GET /products', function() {

    // Controller - Products
    global $controller;
    $controller->products();
});

// CONTACT ROUTE
$f3->route('GET|POST /contact', function() {

    // Controller - Contact
    global $controller;
    $controller->contact();
});

// FORM FINISH
$f3->route('GET|POST /form-finish', function (){

    // Controller - Form Finish
    global $controller;
    $controller->formFinish();
});

// LOGIN ROUTE
$f3->route('GET|POST /login', function() {

    // Controller - Login
    global $controller;
    $controller->login();
});

// ADMIN ROUTE
$f3->route('GET|POST /admin', function() {

    // Controller - Admin
    global $controller;
    $controller->admin();
});

// ADMIN - PRODUCTS
$f3->route('GET|POST /admin-add-product', function() {

    // Controller - Add Product
    global $controller;
    $controller->addProduct();
});

// ADMIN - SERVICES
$f3->route('GET|POST /admin-add-service', function() {

    // Controller - Add Product
    global $controller;
    $controller->addService();
});

// ADD STYLIST
$f3->route('GET|POST /admin-add-stylist-form', function (){

    // Controller - Add Stylist
    global $controller;
    $controller->addStylist();
});

// DELETE STYLISTS
$f3->route('GET|POST /admin-delete-stylist-form', function (){

    // Controller - Add Stylist
    global $controller;
    $controller->deleteStylist();
});

// UPDATE STYLIST
$f3->route('GET|POST /admin-update-stylist-form', function (){

    // Controller - Add Stylist
    global $controller;
    $controller->updateStylist();
});

// ALT STYLISTS
$f3->route('GET|POST /admin-add-stylist', function () {
    $view = new Template();
    echo $view->render('views/admin-add-stylist.php');
});

// VIEW ENQUIRIES
$f3->route('GET|POST /admin-view-contacts', function (){

    // Controller - View Contacts
    global $controller;
    $controller->adminViewContacts();
});

//  Run fat free - has to be the last thing in the file
$f3->run();
