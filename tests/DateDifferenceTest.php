<?php

use App\DateDifference;
use PHPUnit\Framework\TestCase;


/*
* This is a testcase for calculating difference between two dates
*
*/

class DateDifferenceTest extends TestCase
{
	private $firstDate;
	private $secondDate;
	private $dateDifferenceInstance;
    private $dateDifferenceInstance2;

	public function setUp()
	{
	    $this->firstDate = '05-Feb-2020';
	    $this->secondDate = '05-Mar-2020';
        $this->thirdDate = '05-Jun-2020';
	    $this->dateDifferenceInstance = new DateDifference($this->firstDate, $this->secondDate);
        $this->dateDifferenceInstance2 = new DateDifference($this->thirdDate, $this->secondDate);

	}

    public function testCalculateDateDifference()
    {
        $this->assertEquals(28, $this->dateDifferenceInstance->calculateDateDifference());
    }

    public function testConvertDateToSeconds()
    {
        $this->assertIsInt($this->dateDifferenceInstance->convertDateToSeconds($this->firstDate));
    }

    public function testCalculateDateDifferenceFailed()
    {
        $this->assertFalse($this->dateDifferenceInstance2->calculateDateDifference());
    }

}
