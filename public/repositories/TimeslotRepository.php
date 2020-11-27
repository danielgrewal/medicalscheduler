<?php 
require_once(__DIR__ . '/../data/Database.php');
require_once(__DIR__ . '/../entities/Timeslot.php');

class TimeslotRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTimeslots()
    {
        $sql = "select * from timeslots;";
        $params = [];
        $result = $this->db->run($sql, $params);
        
        $timeslotArray = $result->fetchAll(PDO::FETCH_CLASS, 'Timeslot');
        return $timeslotArray;
    }
}

?>