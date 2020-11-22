<?php 

require_once(__DIR__ . '/../repositories/UserRepository.php');

class AuthenticationService 
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function loginUser()
    {

    }
}

?>