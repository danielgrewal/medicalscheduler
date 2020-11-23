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

    public function getUserByEmailAndPassword(string $email, string $password)
    {
        $sql = "SELECT * FROM Users where email = ? and password = ?";
        $params = [$email, $password];
        $result = $this->db->run($sql, $params);
        
        return $result->fetchAll(PDO::FETCH_CLASS, 'User');
    }
}

?>