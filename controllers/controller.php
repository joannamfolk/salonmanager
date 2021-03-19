<?php

//  Controller head for Salon Manager

class Controller
{
    private $_f3;

    // Constructor
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    // Home View
    function home()
    {
        // View - Home
        $view = new Template();
        echo $view->render('views/home.html');
    }

    // Appointments
    function appointment()
    {

        // View - Appointment
        $view = new Template();
        echo $view->render('views/appointment.html');
    }

    // Services
    function services()
    {
        global $dataLayer;

        $this->_f3->set('services', $dataLayer->getServices());

        // View - Services
        $view = new Template();
        echo $view->render('views/services.html');
    }

    // Stylists
    function stylists()
    {
        global $dataLayer;

        $this->_f3->set('stylists', $dataLayer->getStylist());

        // View - Stylists
        $view = new Template();
        echo $view->render('views/stylist.html');
    }

    // Products
    function products()
    {
        global $dataLayer;

        $this->_f3->set('products', $dataLayer->getProducts());

        // View - Products
        $view = new Template();
        echo $view->render('views/products.html');
    }

    // Contact
    function contact()
    {

        global $dataLayer;
        global $validator;
        global $contact;

        // Save On Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//            var_dump(trim($_POST['preferredTimes']));

            // Get Session Vars
            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $comments = trim($_POST['comments']);

            // Name
            if (!$validator->validName($name)) {
                $this->_f3->set('errors["name"]', "*Required");
            }

            // Phone
            if (!$validator->validPhone($phone)) {
                $this->_f3->set('errors["phone"]', "*Required");
            }

            // Email
            if (!$validator->validEmail($email)) {
                $this->_f3->set('errors["email"]', "*Required");
            }

            // Preferred Days
            if(isset($_POST['days'])) {

                //Get days from post array
                $userDays = $_POST['days'];

                //Data is valid -> Add to session
                if ($validator->validPreferredDays($userDays)) {
                    $daysString = implode(", ", $userDays);
                    $contact->setPreferredDays($daysString);
                }
                //Data is not valid -> We've been spoofed!
                else {
                    $this->_f3->set('errors["days"]', "*ERROR!!!");
                }
            }

            // Preferred Times
            //If condiments were selected
            if(isset($_POST['times'])) {

                //Get condiments from post array
                $userTimes = $_POST['times'];

                //Data is valid -> Add to session
                if ($validator->validPreferredTimes($userTimes)) {
                    $timeString = implode(", ", $userTimes);
                    $contact->setPreferredTimes($timeString);
                }
                //Data is not valid -> We've been spoofed!
                else {
                    $this->_f3->set('errors["times"]', "*ERROR!!!");
                }
            }

            // If Okay
            if (empty($this->_f3->get('errors'))) {
                $contact->setName($name);
                $contact->setPhone($phone);
                $contact->setEmail($email);
                $contact->setComments($comments);

                // Send to DB
                $dataLayer->saveContact($contact);

                // Reroute to page
                $this->_f3->reroute('/form-finish');
            }
        }

        // Stickies
        $this->_f3->set('name', isset($name) ? $name : "");
        $this->_f3->set('phone', isset($phone) ? $phone  : "");
        $this->_f3->set('email', isset($email) ? $email : "");
        $this->_f3->set('preferredDays', $dataLayer->getPreferredDays());
        $this->_f3->set('preferredTimes', $dataLayer->getPreferredTimes());
        $this->_f3->set('comments', isset($comments) ? $comments : "");
        $this->_f3->set('condiments', $dataLayer->getPreferredDays());

        // View _ Contact
        $view = new Template();
        echo $view->render('views/contact.html');
    }

    function formFinish()
    {
        // View _ Contact
        $view = new Template();
        echo $view->render('views/form-finish.html');
    }

    // Admin - View Contacts
    function adminViewContacts()
    {
        global $dataLayer;

        $this->_f3->set('contacts', $dataLayer->getContacts());

        // View - Admin View Contacts
        $view = new Template();
        echo $view->render('views/admin-view-contacts.php');
    }

    // Login
    function login()
    {

        global $dataLayer;

        // Get Admin User/Session Array
        $adminLogin = $dataLayer->getAdminUsername();
        $userLogin = trim($_POST['username']);

        // Get Admin Password/Session Array
        $adminPassword = $dataLayer->getAdminPassword();
        $userPassword = trim($_POST['password']);

        // If valid - continue - else echo "INVALID"
        if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {
        if($userLogin == $adminLogin && $userPassword == $adminPassword){
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $adminLogin;
        $this->_f3->reroute('views/admin.html');
        } else{
            echo "INVALID";
        }
        }

        // View - Login
        $view = new Template();
        echo $view->render('views/login.html');
    }

    // Admin
    function admin()
    {
        $view = new Template();
        echo $view->render('views/admin.html');
    }

    // Add Product
    function addProduct()
    {

        global $dataLayer;
        global $validator;

        $dataLayer->getProducts();
        var_dump($_POST);

        // get data from post array and trim the values
        $productName = trim($_POST['product-name']);
        $productDescription = trim($_POST['product-description']);
        $productSize = trim($_POST['product-size']);
        $productPrice = trim($_POST['product-price']);
        $productCategory = trim($_POST['product-category']);

        // Validate and set error messages
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Validate Name
            if($validator->validProduct($productName)){
                $_SESSION['product_name'] = $productName;
            } else {
                $this->_f3->set('errors["productname"]', "Product Name Required - Alphabetic Characters Only");
            }

            // Validate - Description
            if($validator->validDescription($productDescription)){
                $_SESSION['product_description'] = $productDescription;
            } else {
                $this->_f3->set('errors["productdescription"]', "Please fill out description for product");
            }

            // Validate - Product Sie
            if(isset($productSize)){
                $_SESSION['product_size'] = $productSize;
            } else {
                $this->_f3->set('errors["productsize"]', "Size Measurement Required");
            }

            // Validate - Producte Price
            if($validator->validPrice($productPrice)){
                $_SESSION['product_price'] = $productPrice;
            } else {
                $this->_f3->set('errors["productprice"]', "Enter price");
            }

            // Validate Category
            if(isset($productCategory)){
                $_SESSION['product_category'] = $productCategory;
            } else {
                $this->_f3->set('errors["productcategory"]', "Select a category");
            }

            // if no errors - save product to database
            if(empty($this->_f3->get('errors'))){
                $dataLayer->saveProduct();
                //var_dump();
            }
        }

        // Add Product
        $this->_f3->set('products', $dataLayer->getProducts());

        // View - Add Product
        $view = new Template();
        echo $view->render('views/admin-add-product.php');
    }

    // Add Stylists
    function addStylist()
    {
        global $dataLayer;
        global $validator;

        $dataLayer->getStylish();
        var_dump($_POST);

        //get data from post array
        $stylistFname = trim($_POST['stylistFirstName']);
        $stylistLname = trim($_POST['stylistLastName']);
        $stylistBio = trim($_POST['stylistBio']);
        $stylistSkill = trim($_POST['stylistSkill']);
        $stylistNickname = trim($_POST['stylistNickname']);
        $stylistPhone = trim($_POST['stylistPhone']);

        // Error Tracking
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Validate First Name
            if ($validator->validName($stylistFname)) {
                $_SESSION['stylist_fname'] = $stylistFname;
            }
            else {
                $this->_f3->set('errors["fname"]', "Stylist Name is Require - Alphabetic Characters Only");
            }

            // Validate Last Name
            if ($validator->validName($stylistLname)) {
                $_SESSION['stylist_lname'] = $stylistLname;
            }
            else {
                $this->_f3->set('errors["lname"]', "Stylist Name is Require - Alphabetic Characters Only");
            }

            // Validate Bio
            if($validator->validBio($stylistBio)){
                $_SESSION['stylist_bio'] = $stylistBio;
            } else {
                $this->_f3->set('errors["bio"]', "Please fill out bio for stylist");
            }

            // Validate Skill
            if($validator->validSkill($stylistSkill)){
                $_SESSION['stylist_skill'] = $stylistSkill;
            } else {
                $this->_f3->set('errors["skill"]', "Please fill out skill for stylist");
            }

            // Validate Nickname
            if($validator->validNickname($stylistNickname)){
                $_SESSION['stylist_nickname'] = $stylistNickname;
            } else {
                $this->_f3->set('errors["nickname"]', "Please fill out nickname for stylist");
            }

            // Validate Phone
            if($validator->validPhone($stylistPhone)){
                $_SESSION['stylist_phone'] = $stylistPhone;
            } else {
                $this->_f3->set('errors["phone"]', "Phone is require and 10 digit long");
            }

            // if no errors - save product to database
            if(empty($this->_f3->get('errors'))){
                $dataLayer->insertStylist();
                //var_dump();
            }
        }

        // Add Stylist
        $this->_f3->set('stylists', $dataLayer->getStylish());

        // View - Add Stylist
        $view = new Template();
        echo $view->render('views/admin-add-stylist.php');
    }
}