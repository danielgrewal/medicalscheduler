<?php 
require_once(__DIR__ . '/../repositories/AppointmentRepository.php');
require_once(__DIR__ . '/../repositories/DoctorRepository.php');
require_once(__DIR__ . '/../repositories/TimeslotRepository.php');

class AppointmentService
{
    private $appointmentRepository;
    private $doctorRepository;
    private $timeslotRepository;
    public $appointments;
    private $errors = [];

    public function __construct()
    {
        $this->appointmentRepository = new AppointmentRepository();
        $this->doctorRepository = new DoctorRepository();
        $this->timeslotRepository = new TimeslotRepository();

        $dateFrom = date('Y-m-d', strtotime('monday this week', strtotime(date('Y-m-d'))));
        $dateTo = date('Y-m-d', strtotime('sunday this week', strtotime(date('Y-m-d'))));
        
        $this->appointments = $this->getAllAppointmentsByDateRange($dateFrom, $dateTo);
    }

    public function createAppoinment($userId, $doctorId, $date, $timeslotId)
    {
        $appointment = $this->appointmentRepository->createAppointment($userId, $doctorId, $date, $timeslotId);
        return $appointment;
    }

    public function getAvailableDoctors($timeSlotId, $strDate)
    {
        $date = new DateTime($strDate);
        return $this->doctorRepository->getDoctorsByAvailability($timeSlotId, $strDate);
    }

    public function isTimeslotAvailable($date, $timeslot)
    {
        
        $combined = date('Y-m-d H:i:s', strtotime("$date $timeslot->StartTime"));
        $datetime = new DateTime($combined);

        if (new DateTime() > $datetime)
            return false;
        
        $id = $timeslot->TimeslotId;
        $timeslotConflicts = array_filter($this->appointments, function(Appointment $appointment) use($id, $date) {
            return $appointment->TimeslotId == $id && $appointment->FullDate == $date;
        });

        if ($timeslotConflicts)
            return false;
        
        return true;
    }

    public function getAllTimeslots()
    {
        return $this->timeslotRepository->getAllTimeslots(); 
    }

    public function getDaysInWeekByDate($strDate)
    {
        $date = date('Y-m-d', strtotime($strDate));
        
        $monday = date('Y-m-d', strtotime('monday this week', strtotime($date)));
        $friday = date('Y-m-d', strtotime('sunday this week', strtotime($date)));

        return $this->getDaysInTimePeriod($monday, $friday);
    }

    public function getAppointmentsByUser($userId)
    {
        return $this->appointmentRepository->getAppointmentsByUser($userId);
    }

    public function isUserAppointment($appointments, $date, $timeslotId)
    {
        $isUsers = array_filter($appointments, function(Appointment $appointment) use($timeslotId, $date) {
            return $appointment->TimeslotId == $timeslotId && $appointment->FullDate == $date;
        });

        return $isUsers;
    }

    private function getDaysInTimePeriod($dateStart, $dateEnd)
    {
        
        $dateFrom = new DateTime($dateStart);
        $dateTo = new DateTime($dateEnd);
        
        // Dateperiod normally excludes the end date
        $dateTo->modify('+1 day');

        $period = new DatePeriod($dateFrom, new DateInterval('P1D'), $dateTo);
        
        foreach ($period as $date) {
            $dates[] = $date->format('Y-m-d');       
        }
        return $dates;
    }


    private function getAllAppointmentsByDateRange($dateFrom, $dateTo)
    {
        return $this->appointmentRepository->getAppointmentsByDateRange($dateFrom, $dateTo);
    }
}


?>