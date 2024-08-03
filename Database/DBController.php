<?php

class DBController{

//Database connection properties
	protected $host='localhost';
	protected $user = 'root';
	protected $password = '';
	protected $database = "thrifthub";

	//connection property
	public $con = null;
	//call contructor
	public function __construct(){

		$this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		if($this->con->connect_error){
			echo"fail".$this->con->connect_error;
		}
		//echo "connection good";
		
	}

public function __destruct(){

	$this->closeConnection();
}


//closing connection
protected function closeConnection(){

	if($this->con!=null){
		$this->con->close();
		$this->con=null;

	}
}
}

