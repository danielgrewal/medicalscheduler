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

    public function getDoctorsByAvailability($timeSlotId, $date)
    {
        $sql = "select * from doctors d where d.DoctorId not in (select a.DoctorId from appointments a inner join doctors d on d.DoctorId = a.DoctorId where a.TimeslotId = ? and a.FullDate = ?);";

        $params = [$timeSlotId, $date];
        $result = $this->db->run($sql, $params);
        $doctorArray = $result->fetchAll(PDO::FETCH_CLASS, 'Doctor');
        return !empty($doctorArray) ? $doctorArray : NULL;
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