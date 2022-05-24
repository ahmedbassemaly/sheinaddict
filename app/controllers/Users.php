<?php
class Users extends Controller
{
    public function register()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setFName(trim($_POST['fname']));
            $registerModel->setLName(trim($_POST['lname']));
            $registerModel->setMobile(trim($_POST['phone']));
            $registerModel->setEmail(trim($_POST['Email']));
            $registerModel->setPassword(trim($_POST['password']));
            $registerModel->setConfirmPassword(trim($_POST['confirm_password']));
            $registerModel->setAddress(trim($_POST['address']));
            

            //validation
            if (empty($registerModel->getFName())) {
                $registerModel->setFNameErr('Please enter your first name');
            }
            if (empty($registerModel->getLName())) {
                $registerModel->setLNameErr('Please enter your last name');
            }
            if (empty($registerModel->getEmail())) {
                $registerModel->setEmailErr('Please enter an email');
            } elseif ($registerModel->emailExist($_POST['Email'])) {
                $registerModel->setEmailErr('Email is already registered');
            }
            if (empty($registerModel->getPassword())) {
                $registerModel->setPasswordErr('Please enter a password');
            } elseif (strlen($registerModel->getPassword()) < 8) {
                $registerModel->setPasswordErr('Password must contain at least 8 characters');
            }

            if ($registerModel->getPassword() != $registerModel->getConfirmPassword()) {
                $registerModel->setConfirmPasswordErr('Passwords do not match');
            }
            
            if (empty($registerModel->getAddress())) {
                $registerModel->setAddressErr('Please enter address');
            }
            if (empty($registerModel->getMobile())) {
                $registerModel->setMobileErr('Please enter your mobile number');
            } elseif(strlen($registerModel->getMobile()) < 11){
                $registerModel->setMobileErr('Mobile number must not be less than 11 characters check again');
            }

            if (
                empty($registerModel->getFNameErr()) &&
                empty($registerModel->getLNameErr())&&
                empty($registerModel->getEmailErr()) &&
                empty($registerModel->getPasswordErr()) &&
                empty($registerModel->getConfirmPasswordErr())&&
                empty($registerModel->getAddressErr())&&
                empty($registerModel->getMobileErr())
            ) {
                // //Hash Password
                 $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));


                if ($registerModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('users/login');
                } else {
                    die('Error in sign up');
                }
                if ($registerModel->editUserData()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('users/Index');
                } else {
                    die('Error in updating profile');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Register.php';
        require_once $viewPath;
        $view = new Register($this->getModel(), $this);
        $view->output();
    }
    public function login()
    {
        $userModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $userModel->setEmail(trim($_POST['email']));
            $userModel->setPassword(trim($_POST['password']));

            //validate login form
            if (empty($userModel->getEmail())) {
                $userModel->setEmailErr('Please enter an email');
            } elseif (!($userModel->emailExist($_POST['email']))) {
                $userModel->setEmailErr('No user found');
            }

            if (empty($userModel->getPassword())) {
                $userModel->setPasswordErr('Please enter a password');
            } elseif (strlen($userModel->getPassword()) < 4) {
                $userModel->setPasswordErr('Password must contain at least 4 characters');
            }

            // If no errors
            if (
                empty($userModel->getEmailErr()) &&
                empty($userModel->getPasswordErr())
            ) {
                //Check login is correct
                
                $loggedUser = $userModel->login();
                if ($loggedUser) {
                    // echo "Bravo";
                    //create related session variables
                    $this->createUserSession($loggedUser);
                    if($_SESSION['userType_id']=="1"){
                        redirect('pages/adminDashboard');
                    }
                    die('Success log in User');
                } else {
                    // echo "no bravo";
                    $userModel->setPasswordErr('Password is not correct');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Login.php';
        require_once $viewPath;
        $view = new Login($userModel, $this);
        $view->output();
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_name'] = $user->firstName;
        $_SESSION['userType_id'] = $user->userType_id;
        $_SESSION['categoryName']=$user->categoryName;
        //header('location: ' . URLROOT . 'pages');
        redirect('pages');
    }

    public function logout()
    {
        echo 'logout called';
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}
