<?php 
require_once(__DIR__ . '/../repositories/AppointmentRepository.php');

class AppointmentService
{
    private $AppointmentRepository;
    private $errors = [];

    public function getDaysInWeekByDate($date)
    {
        $monday = date('Y-m-d', strtotime('monday this week', strtotime($date)));
        $friday = date('Y-m-d', strtotime('friday this week', strtotime($date)));

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
}


?>