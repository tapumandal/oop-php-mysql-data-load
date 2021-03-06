<?php

class User{

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

		<h2>User Table</h2>

		<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
		  <tr>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">user_id</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">first_name</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">last_name</th>
		  </tr>
		';
		foreach ($this->rows as $key => $value) {	

			echo '
				<tr>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["user_id"].'</td>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["first_name"].'</td>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["last_name"].'</td>
				</tr>
			';
		}
		echo '
			</table>
		';
	}

	public function jointResult(){
		echo '
		<style>
			tr:nth-child(even) {
			  background-color: #dddddd;
		}
		</style>

		<h2>Join Result</h2>

		<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
		  <tr>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">User Name</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Avg Correct Ans</th>
		    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Recent Test Time</th>
		  </tr>
		';
		foreach ($this->rows as $key => $value) {	

			echo '
				<tr>
				    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$value["first_name"].' '.$value["last_name"].'</td>
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