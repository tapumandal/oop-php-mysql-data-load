<?php

class TestResult{
	protected $db;
	protected $rows;

	function __construct($db){
		$this->db = $db;
	}


	public function load($sql){
		$this->rows = $this->db->myQuery($sql)->getResult();
		return $this;
	}



	public function printTable(){
		echo '
		<style>
			tr:nth-child(even) {
			  background-color: #dddddd;
		}
		</style>

		<h2>Test Result Table</h2>

		<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
		  <tr>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">user_id</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">test_id</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">correct</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">time_taken</th>
		  </tr>
		';
		foreach ($this->rows as $key => $value) {	

			echo '
				<tr>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["user_id"].'</td>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["test_id"].'</td>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["correct"].'</td>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["time_taken"].'</td>
				</tr>
			';
		}
		echo '
			</table>
		';
	}
}