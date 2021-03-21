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

        // If valid - continue - else echo "INVALID"
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get Admin Username and Password From DB to start session with logged in admin
            $adminLogin = $dataLayer->getAdminLogin();
            $userLogin = trim($_POST['username']);
            $userPassword = trim(sha1($_POST['password']));

            print_r($adminLogin);
            // Check Username
            if($userLogin == $adminLogin['admin_username']){
                $_SESSION['admin_username'] = $userLogin;
            } else{
                $this->_f3->set('errors["username"]', "Invalid Username");
            }

            // Check Password
            if($userPassword == $adminLogin['admin_password']){
                $_SESSION['admin_password'] = $userPassword;
            } else{
                $this->_f3->set('errors["password"]', "Invalid Password");
            }
            var_dump($_POST);
            var_dump($_SESSION['admin_username']);

            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute('admin');
                header('location : admin.html');
            }
        }

        // View - Login
        $view = new Template();
        echo $view->render('views/login.html');
    }

    // Logout
    function logout(){
        session_destroy();
        $_SESSION = array();
        header('location: login.html');
    }

    // Admin
    function admin()
    {
        var_dump($_SESSION);
        $view = new Template();
        echo $view->render('views/admin.html');
    }

    // Add Service
    function addService()
    {

        global $dataLayer;
        global $validator;

        $dataLayer->getServices();
        //var_dump($_POST);

        // get data from post array and trim the values
        $serviceName = trim($_POST['service-name']);
        $serviceDescription = trim($_POST['service-description']);
        $servicePrice = trim($_POST['service-price']);


        // Validate and set error messages
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Validate Name
            if($validator->validService($serviceName)){
                $_SESSION['service_name'] = $serviceName;
            } else {
                $this->_f3->set('errors["servicename"]', "Service Name Required");
            }

            // Validate - Description
            if($validator->validDescription($serviceDescription)){
                $_SESSION['service_description'] = $serviceDescription;
            } else {
                $this->_f3->set('errors["servicedescription"]', "Please fill out description for service");
            }


            // Validate - Producte Price
            if($validator->validPrice($servicePrice)){
                $_SESSION['service_price'] = $servicePrice;
            } else {
                $this->_f3->set('errors["serviceprice"]', "Enter price");
            }

            // if no errors - save product to database
            if(empty($this->_f3->get('errors'))){
                $dataLayer->saveService();
            }
        }

        // Add Service
        $this->_f3->set('services', $dataLayer->getServices());

        // View - Add Service
        $view = new Template();
        echo $view->render('views/admin-add-service.php');
    }

    // Add Product
    function addProduct()
    {

        global $dataLayer;
        global $validator;

        $dataLayer->getProducts();
        //var_dump($_POST);

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
        $this->_f3->set('fname', isset($stylistFname) ? $stylistFname : "");
        $this->_f3->set('lname', isset($stylistLname) ? $stylistLname : "");
        $this->_f3->set('bio', isset($stylistBio) ? $stylistBio : "");
        $this->_f3->set('skill', isset($stylistSkill) ? $stylistSkill : "");
        $this->_f3->set('nickname', isset($stylistNickname) ? $stylistNickname : "");
        $this->_f3->set('phone', isset($stylistPhone) ? $stylistPhone : "");
        // View - Add Stylist
        $view = new Template();
        echo $view->render('views/admin-add-stylist-form.php');
    }

    function deleteStylist()
    {
        global $dataLayer;
        global $validator;

        $stylistFname = trim($_POST['stylistFirstName']);
        $stylistLname = trim($_POST['stylistLastName']);


        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Validate and set error messages
            if ($validator->validName($stylistFname)) {
                $_SESSION['stylist_fname'] = $stylistFname;
            }
            else {
                $this->_f3-> set('errors["fname"]', "Stylist Name is Require - Alphabetic Characters Only");
            }


            if ($validator->validName($stylistLname)) {
                $_SESSION['stylist_lname'] = $stylistLname;
            }
            else {
                $this->_f3-> set('errors["lname"]', "Stylist Name is Require - Alphabetic Characters Only");
            }

            // if no errors - save product to database
            if(empty($this->_f3->get('errors'))){
                $dataLayer->deleteStylist();
                //var_dump();
            }
        }

        //set sticky form beehive
        //$f3->set('stylists', getStylish());
        $this->_f3->set('fname', isset($stylistFname) ? $stylistFname : "");
        $this->_f3->set('lname', isset($stylistLname) ? $stylistLname : "");



        $view = new Template();
        echo $view->render('views/admin-delete-stylist-form.php');
    }

    function updateStylist()
    {
        global $dataLayer;
        global $validator;
        $stylistFname = trim($_POST['stylistFirstName']);
        $stylistLname = trim($_POST['stylistLastName']);
        $stylistBio = trim($_POST['stylistBio']);
        $stylistSkill = trim($_POST['stylistSkill']);
        $stylistNickname = trim($_POST['stylistNickname']);
        $stylistPhone = trim($_POST['stylistPhone']);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Validate and set error messages
            if(isset($stylistFname)){
                if ($validator->updateName($stylistFname)) {
                    $_SESSION['stylist_fname'] = $stylistFname;
                }
                else {
                    $this->_f3-> set('errors["fname"]', "Please enter a valid name");
                }
            }

            if ($validator->updateName($stylistLname)) {
                $_SESSION['stylist_lname'] = $stylistLname;
            }
            else {
                $this->_f3-> set('errors["lname"]', "Please enter a valid name");
            }


            if($validator->updateBio($stylistBio)){
                $_SESSION['stylist_bio'] = $stylistBio;
            } else {
                $this->_f3-> set('errors["bio"]', "Please enter a valid input");
            }

            if($validator->updateSkill($stylistSkill)){
                $_SESSION['stylist_skill'] = $stylistSkill;
            } else {
                $this->_f3-> set('errors["skill"]', "Please enter a valid input");
            }

            if($validator->validNickname($stylistNickname)){
                $_SESSION['stylist_nickname'] = $stylistNickname;
            } else {
                $this->_f3-> set('errors["nickname"]', "Please enter a valid name in put");
            }

            if($validator->updatePhone($stylistPhone)){
                $_SESSION['stylist_phone'] = $stylistPhone;
            } else {
                $this->_f3-> set('errors["phone"]', "Please enter valid phone number (10 digit)");
            }

            // if no errors - save product to database
            if(empty($this->_f3->get('errors'))){
                $dataLayer->updateStylist();
                //var_dump();
            }
        }


        //set sticky form beehive
        $this->_f3->set('stylists', $dataLayer->getStylish());
        $this->_f3->set('fname', isset($stylistFname) ? $stylistFname : "");
        $this->_f3->set('lname', isset($stylistLname) ? $stylistLname : "");
        $this->_f3->set('bio', isset($stylistBio) ? $stylistBio : "");
        $this->_f3->set('skill', isset($stylistSkill) ? $stylistSkill : "");
        $this->_f3->set('nickname', isset($stylistNickname) ? $stylistNickname : "");
        $this->_f3->set('phone', isset($stylistPhone) ? $stylistPhone : "");


        $view = new Template();
        echo $view->render('views/admin-update-stylist-form.php');
    }
}