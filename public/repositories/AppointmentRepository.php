<?php

require_once(__DIR__ . '/../data/Database.php');
require_once(__DIR__ . '/../entities/Appointment.php');
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

    public function getAppointmentsByDateRange($dateFrom, $dateTo, $doctorId = null)
    {
        $sql = "select *  from appointments a
        inner join Doctors d on d.DoctorId = a.DoctorId
        inner join Specialties s on s.SpecialtyId = d.SpecialtyId
        inner join Timeslots t on t.TimeslotId = a.TimeslotId
        where 1 = 1
        AND FullDate >= ? and FullDate <= ?";
        $params = [$dateFrom, $dateTo];

        if (!empty($doctorId))
        {
            $sql .= " AND d.DoctorId = ?;";
            $params[] = $doctorId;
        }

        $result = $this->db->run($sql, $params);
        $appointmentsArray = $result->fetchAll(PDO::FETCH_CLASS, 'Appointment');
        return $appointmentsArray;
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