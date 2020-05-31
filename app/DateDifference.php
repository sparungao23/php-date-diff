<?php

declare(strict_types=1);

namespace App;
require_once 'config.php';


/*
* DateDifference class contains all methods to convert number of days between two dates
*
*/

class DateDifference
{
    private $firstDate;
    private $secondDate;
    private $totalSecondsPerDay = 86400;

    public function __construct($firstDate, $secondDate)
    {
        $this->firstDate = $firstDate;
        $this->secondDate = $secondDate;
    }

    /**
     * this method calculate the number of days between 2 dates
     * 
     * @return mixed
     */
    public function calculateDateDifference()
    {
        if(
            $this->convertDateToSeconds($this->firstDate)
             > $this->convertDateToSeconds($this->secondDate)
         ) {
            return false;
        }
        $dateDiff = $this->convertDateToSeconds($this->secondDate)
         - $this->convertDateToSeconds($this->firstDate);
        return ($dateDiff / $this->totalSecondsPerDay);
    }

    /**
     * this method convert dates to timestamp
     * 
     * @param string $date
     * @return int
     */
    public function convertDateToSeconds(string $date) : int
    {
        $parseDate = explode("-", $date);

        $year = $parseDate[2];
        $month = array_key_exists($parseDate[1], MONTHS) ? MONTHS[$parseDate[1]] : 1;
        $day = $parseDate[0];

        $totalSeconds = 0;
    
        for ($x = 1970; $x < $year; $x++) {
            if ($x%4 == 0) {
                $totalSeconds += "31622400";
            } else {
                $totalSeconds += "31536000";
            }
        }

        for ($y = 1; $y < $month; $y++) {
            if (($year % 4) == 0 and $y==2) {
                $totalSeconds += NUMBEROFDAYSPERMONTH[$y] * $this->totalSecondsPerDay;
            } else {
                $totalSeconds += NUMBEROFDAYSPERMONTH[$y] * $this->totalSecondsPerDay;
            }
        }

        $totalSeconds += $day * $this->totalSecondsPerDay;
    
        return $totalSeconds;
    }

}   