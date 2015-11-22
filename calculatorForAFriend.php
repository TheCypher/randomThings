<?php
/**
* Calculator for a friend
* @author Nickson Ariemba
*/

/*
$course = $_POST['course'];
$credit = $_POST['credit'];
$sn = $_POST['sname'];
$somenumber = [100, 80];
*/

$course = 90.3;//$_POST['course'];
$credit = 91;//$_POST['credit'];
$sn = 1;//$_POST['sname'];
$somenumber = [100, 99];

$calculate = [
	[
		'course'=>$course,
		'credit'=>$credit,
		'sname'=>$sn,
		'somenumber'=>$somenumber,
		'gp'=>4
	],

	[
		'course'=>10,
		'credit'=>11,
		'sname'=>2,
		'somenumber'=>[20, 21],
		'gp'=>4
	]
];

$calculatorClass = new Calculator();
$cal = $calculatorClass->calculator($calculate);
echo $cal;

/**
* Calculator
*/
class Calculator
{
	/**
	* @param array[[course => int, sname => int, somenumber => [array], gp => int], [calculate]]
	* @return float
	*/
	public function calculator($calculate)
	{
		
		$cgpa = [];
		foreach ($calculate as $calculate) {
			if ($calculate['course'] <= $calculate['somenumber'][1] and $calculate['course'] >= $calculate['somenumber'][2]) {
				$cgpa[] = $calculate['course'] * $calculate['gp']/16;
			}
		}
		return array_sum($cgpa);
	}	
}
?>
