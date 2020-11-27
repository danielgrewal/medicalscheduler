<?php

require_once(__DIR__ . '/../data/Database.php');
// require_once(__DIR__ . '/../entities/Appoinment.php');
// require_once(__DIR__ . '/../entities/Doctor.php');
// require_once(__DIR__ . '/../entities/User.php');

class AppointmentRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAppointmentByAppointmentId($id)
    {}

    public function getAppointmentsByDate($date, $doctorId = null)
    {
        $sql = "";
    }

    public function getAppointmentsByUserId($UserId)
    {}

    public function createAppointment($userId, $doctorId, $date, $time)
    {}

    public function updateAppointment($oldAppointmentId, $userId, $doctorId, $date, $time)
    {}

    public function removeAppointment($AppointmentId)
    {}

}

?>