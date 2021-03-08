<?php
function personal()
{
    global $validator;

    //If user submits data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Assign post array to variables
        $fName = trim($_POST['fName']);
        $lName = trim($_POST['lName']);
        $age = trim($_POST['age']);
        $gender = $_POST['genders'];
        $number = trim($_POST['number']);
        $premium = $_POST['premium'];

        //Validation
        if (!$validator->validfName($fName)) {
            $this->_f3->set('errors["fName"]', "Invalid first name. Must contain only alphabetical characters and can't be empty.");
        }

        if (!$validator->validlName($lName)) {
            $this->_f3->set('errors["lName"]', "Invalid last name. Must contain only alphabetical characters and can't be empty.");
        }

        if (!$validator->validAge($age)) {
            $this->_f3->set('errors["age"]', "Invalid age. Must be between 18 - 118.");
        }

        if (!$validator->validPhone($number)) {
            $this->_f3->set('errors["number"]', "Invalid phone number. Must be 10-11 digits");
        }

        if (!isset($gender)) {
            $this->_f3->set('errors["genders"]', "Must choose a gender");
        }

        //If there are no errors,
        // instantiate appropriate member object and redirect user to profile.
        if (empty($this->_f3->get('errors'))) {

            //If user signs up for premium
            if($premium == "on") {
                $member = new PremiumMember($fName, $lName, $age, $gender, $number);

                $_SESSION['$member'] =
                    serialize($member);

                //If does not user signs up for premium
            } else {

                $member = new Member($fName, $lName, $age, $gender, $number);

                $_SESSION['$member'] =
                    serialize($member);
            }

            $this->_f3->reroute('/profileInfo');
        }
    }

    //Sticky data
    $this->_f3->set('fName', isset($fName) ? $fName : "");
    $this->_f3->set('lName', isset($lName) ? $lName  : "");
    $this->_f3->set('age', isset($age) ? $age : "");
    $this->_f3->set('gender', isset($gender) ? $gender : "");
    $this->_f3->set('number', isset($number) ? $number : "");
    $this->_f3->set('premium', isset($premium) ? $premium : "");

    //Render view
    $view = new Template();
    echo $view->render('views/personal-info.html');
}