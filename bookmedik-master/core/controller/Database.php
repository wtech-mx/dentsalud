<?php


class Database {


	public static $db;
	public static $con;
	function Database(){
		$this->user="root";
		$this->pass="";
		$this->host="localhost";
		$this->ddbb="DentSalud-DB1";
	}

	function connect(){
		$con = mysqli_connect($this->host,$this->user,$this->pass,$this->ddbb)or die ("No se ha podido conectar al servidor de Base de datos");
		if ($con->connect_errno) {
   		 echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
		


		$con->query("set sql_mode=''");
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
