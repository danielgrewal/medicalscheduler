<?php 

require_once(__DIR__ . '/../data/Database.php');
require_once(__DIR__ . '/../entities/Doctor.php');

class DoctorRepository
{
    private static $instance = null;
    private $db;

    private function __construct()
    {
        $this->db = new Database();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new DoctorRepository();
        }
    
        return self::$instance;
    }
}


?>