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

    public function getAllDoctors()
    {

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

        // if ($this->isWeekend($date))
        //     $date = strtotime('monday next week', strtotime($date));
        
        $monday = date('Y-m-d', strtotime('monday this week', strtotime($date)));
        $friday = date('Y-m-d', strtotime('sunday this week', strtotime($date)));

        return $this->getDaysInTimePeriod($monday, $friday);
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

    // private function isWeekend($date) 
    // {
    //     return date('N', strtotime($date)) >= 6;
    // }
}


?>