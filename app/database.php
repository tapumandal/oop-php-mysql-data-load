<?php
class Database{
	protected $servername;
	protected $username;
	protected $password;
	protected $database;
	protected static $instance;
	protected $connection;
	protected $result;
	protected $rows;

	private function __construct(){}

	static function getInstance(){

		if(!self::$instance){
			self::$instance = new self();
		}

		return self::$instance;
	}

	function connect($servername, $username, $password, $database){
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->connection = mysqli_connect($servername, $username, $password, $database);
	}

	public function myQuery($sql){
		$this->result = mysqli_query($this->connection, $sql);
		// return $this->result;
		return $this;
	}

	public function getResult(){
		$obj = "Result is empty";
		if($this->result){
			$obj = mysqli_fetch_assoc($this->result);
		}

		return $this->result;
	}
}