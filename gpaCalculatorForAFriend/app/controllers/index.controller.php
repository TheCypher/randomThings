<?php
use Engine\Calculator\Calculator as Calculator;

class IndexController extends BaseController
{
	public function index($view)
	{	
		$calculatorClass = new Calculator();	
		$rows = $calculatorClass->generateTables(2);

		$gpa = "";
		if (isset($_POST['subjectName'], $_POST['courceCredit'] , $_POST['myCredit'] , $_POST['percentage'])) {
			
			$subjectName = $_POST['subjectName'];
			$course = $_POST['courceCredit'];
			$credit = $_POST['myCredit'];
			$somenumber1 = $_POST['percentage'];
			$somenumber2 = $_POST['percentageTwo'];


			$calculate = [
				[
					'course'=>$course[0],
					'credit'=>$credit[0],
					'sname'=>$subjectName[0],
					'somenumber'=>[$somenumber1[0],$somenumber2[0]],
					'gp'=>4
				],
				[
					'course'=>$course[1],
					'credit'=>$credit[1],
					'sname'=>$subjectName[1],
					'somenumber'=>$somenumber1[1],
					'gp'=>4
				]
			];

			
			$gpa = $calculatorClass->calculator($calculate);
			$gpa = '<button class="btn">Calculated GPA: '.$gpa.'</button>';
		}
		/*-- load view  --*/
		include $view;
	}
}
?>