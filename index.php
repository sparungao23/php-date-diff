<?php

require __DIR__ . '/vendor/autoload.php';

use App\DateDifference;

$dateDifference = new DateDifference('05-Feb-2020', '05-Mar-2020');
echo $dateDifference->calculateDateDifference();
//output is the total number of days, also if first date is greater than second date the return is zero.
