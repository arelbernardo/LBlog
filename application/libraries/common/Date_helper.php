<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Date_helper {

    const NUMBER_OF_MONTHS = 12,
        YEAR_ALLOWANCE = 110,
        MAX_DAY_OF_MONTH = 31;

    public function __construct(){
        date_default_timezone_set('Asia/Manila');
    }

    public function now(){
        $now = new DateTime();
        return $now->format('Y-m-d H:i:s');
    }

    public function today(){
        $today = new DateTime();
        return $today->format('Y-m-d');
    }

    public function getDate($date) {
        $date = new DateTime($date);
        return $date->format('Y-m-d');
    }

    public function year(){
        $year = new DateTime();
        return $year->format('Y');
    }

    public function getMonth($date) {
        $month = new DateTime($date);
        return $month->format('M');
    }

    public function getListOfYears() {
        $yearDifference = self::YEAR_ALLOWANCE;
        $currentYear = $this->year();
        $years = array();
        while($yearDifference >= 0) {
            array_push($years, (string) $currentYear);
            $yearDifference--;
            $currentYear--;
        }
        return $years;
    }

    public function getListOfMonths() {
        $today = $this->today();
        $today = explode("-", $today);
        $months = array();
        for($x = 1, $y = self::NUMBER_OF_MONTHS; $x <= $y; $x++) {
            array_push($months, (string) $this->getMonth($today[0]. "-" .$x."-"."01") );
        }
        return $months;
    }

    public function getListOfDays() {
        $days = array();
        for($x = 1, $y = self::MAX_DAY_OF_MONTH; $x <= $y; $x++) {
            array_push($days, (string) $x);
        }
        return $days;
    }

    public function getAgeByDate($date) {
        //alternative way for computing age for lower version of php <= 5.2.*
        $date = $this->getDate($date);
        $today = $this->today();
        $interval = strtotime($today) - strtotime($date);
        $age =  floor((int) $interval / (((60 * 60) * 24) * 365.25));
        return $age;
    }

    /*public function getAgeByDate($date) { for higher version of php supporint date interval diff
        $date = new DateTime($this->getDate($date));
        $today = new DateTime($this->today());
        $interval = $date->diff($today);
        return (int) $interval->format('%R%y');
    }*/
}