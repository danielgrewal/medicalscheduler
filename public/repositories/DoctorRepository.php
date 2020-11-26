<?php 

require_once(__DIR__ . '/../data/Database.php');
require_once(__DIR__ . '/../entities/Doctor.php');

class DoctorRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDoctorByDoctorId($id)
    {
        $sql = "SELECT * FROM Doctors where DoctorId = ?";
        $params = [$id];
        $result = $this->db->run($sql, $params);
        
        $doctorArray = $result->fetchAll(PDO::FETCH_CLASS, 'Doctor');
        return !empty($DoctorArray) ? $doctorArray[0] : NULL;
    }

    public function getDoctorsBySpecialtyId($id)
    {
        $sql = "SELECT * FROM Doctors where SpecialtyId = ?";
        $params = [$id];
        $result = $this->db->run($sql, $params);
        
        $doctorArray = $result->fetchAll(PDO::FETCH_CLASS, 'Doctor');
        return !empty($DoctorArray) ? $doctorArray : NULL;
    }

}


?>