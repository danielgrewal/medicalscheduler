<?php 

require_once(__DIR__ . '/../repositories/UserRepository.php');

class AuthenticationService 
{
    private $userRepository;
    private $errors = []; 

    public static function authenticate()
    {
        if (!isset($_SESSION['UserId']))
        {
            header( "Location: login.php", false, 303);
            exit();
        }

        //TODO: implement session expiry after 30 min
    }
    
    public function getUser(string $email, string $password)
    {
        $this->checkEmailProvided($email);
        $this->checkPasswordProvided($password);

        if (!empty($this->errors))
            return null;

        $this->userRepository = new UserRepository();
        $user = $this->userRepository->getUserByEmailAndPassword($email, $password);
        
        if (!$user)
        {
            $this->addError('form', 'You have not provided a valid email and password combination.');
            return null;
        }

        return $user;
    }

    public function registerUser($firstName, $lastName, $email, $password, $password2)
    {
        $this->checkValidName($firstName, $lastName);
        $this->checkEmailProvided($email);
        $this->checkPasswordProvided($password);
        $this->checkPasswordMatch($password, $password2);

        if (!empty($this->errors))
            return null;

        $this->userRepository = new UserRepository();
        
        if ($this->userRepository->getUserByEmail($email))
        {
            $this->addError("email", "This email address is already in use.");
            return null;
        }

        $user = $this->userRepository->createUser($firstName, $lastName, $email, $password);
        return $user;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function populateSession($user)
    {
        $_SESSION['UserId'] = $user->UserId;
        $_SESSION['Email'] = $user->Email;
        $_SESSION['FirstName'] = $user->FirstName;
        $_SESSION['Password'] = $user->Password;
        $_SESSION['SessionStart'] = time();
        $_SESSION['SessionExpire'] = $_SESSION['SessionStart'] + 1800;
    }

    private function checkEmailProvided($email)
    {
        $value = trim($email);

        if (empty($value))
        {
            $this->addError("email", "Email address cannot be empty.");
        }
        else if (!filter_var($value, FILTER_VALIDATE_EMAIL))
        {
            $this->addError("email", "You have not provided a valid email address.");
        }
    }

    private function checkPasswordProvided($password)
    {
        if (empty($password))
        {
            $this->addError("password", "Password cannot be empty.");
        }
    }

    private function checkPasswordMatch($password, $password2)
    {
        if (!$password == $password2)
        {
            $this->addError("form", "Passwords must match.");
        }
    }

    private function checkValidName($firstName, $lastName)
    {
        $fname = trim($firstName);
        $lname = trim($lastName);

        if (empty($fname))
            $this->addError("firstName", "First name must be provided.");
        else if (!preg_match("/^[a-zA-Z'-]+$/", $fname))
            $this->addError("firstName", "You have not provided a valid first name");
        
        if (empty($lname))
            $this->addError("lastName", "Last name must be provided.");
        else if (!preg_match("/^[a-zA-Z'-]+$/", $lname))
            $this->addError("firstName", "You have not provided a valid last name");
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}

?>