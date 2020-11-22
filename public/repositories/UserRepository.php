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

    public function getUserByUsernameAndPassword(string $username, string $password)
    {
        $sql = "SELECT * FROM Users where email = ? and password = ?";
        $params = [$username, $password];
        $result = $this->db->run($sql, $params);
        
        return $result->fetchAll(PDO::FETCH_CLASS, 'User');
    }
}

?>