<?php

require __DIR__ . '/vendor/autoload.php';

use App\DateDifference;

$dateDifference = new DateDifference('05-Feb-2020', '05-Mar-2020');
echo $dateDifference->calculateDateDifference();
