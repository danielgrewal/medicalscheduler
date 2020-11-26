<?php 

require_once(__DIR__ . '/../data/Database.php');
require_once(__DIR__ . '/../entities/User.php');

class UserRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $sql = "SELECT * FROM Users where email = ? and password = ?";
        $params = [$email, $password];
        $result = $this->db->run($sql, $params);
        
        $userArray = $result->fetchAll(PDO::FETCH_CLASS, 'User');
        return !empty($userArray) ? $userArray[0] : NULL;
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM Users where email = ?";
        $params = [$email];
        $result = $this->db->run($sql, $params);
        
        $userArray = $result->fetchAll(PDO::FETCH_CLASS, 'User');
        return !empty($userArray) ? $userArray[0] : NULL;
    }

    public function createUser($firstName, $lastName, $email, $password)
    {
        try
        {
            $sql = "INSERT INTO Users VALUES (NULL, ?, ?, ?, ?)";
            $params = [$firstName, $lastName, $email, $password];
            $result = $this->db->run($sql, $params);
            
            $user = new User();
            $user->UserId = $this->db->getLastInsertedId();
            $user->FirstName = $firstName;
            $user->LastName = $lastName;
            $user->Email = $email;
            $user->Password = $password;

            return $user;
        }
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }     
    }
}

?>