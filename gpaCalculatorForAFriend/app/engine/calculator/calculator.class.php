<?php
namespace Engine\Calculator;
/**
* Calculator
*/
class Calculator
{
	/**
	* @param int
	* @return string
	*/
	public function generateTables($needRows)
	{
		$rows = [];
		for ($i=0; $i < $needRows; $i++) { 
			$rows[] = '
                <tr>
                	<td>
                    	<div class="pull-right search">
                    		<input class="form-control" type="text" name="subjectName[]" placeholder="Subject Name: Math">
                    	</div>
                	</td>
                	<td>
                    	<div class="pull-right search">
                    		<input class="form-control" type="text" name="courceCredit[]" placeholder="Course credit: 10">
                    	</div>
                	</td>
                	<td>
                    	<div class="pull-right search">
                    		<input class="form-control" type="text" name="myCredit[]" placeholder="Credit Hours: 11">
                    	</div>
                	</td>
                	<td>
                    	<div class="pull-right search">
                    		<input class="form-control" type="text" name="percentage[]" placeholder="Percentage: 20">
                    	</div>
                	</td>
                	<td>
                    	<div class="pull-right search">
                    		<input class="form-control" type="text" name="percentageTwo[]" placeholder="Percentage: 21">
                    	</div>
                	</td>
                </tr>
			';
		}
		return $rows;
	}


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
