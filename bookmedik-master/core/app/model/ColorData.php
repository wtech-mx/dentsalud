<?php
class ColorData {
	public static $tablename = "color";


	public function ColorData(){
		$this->name = "";
		$this->color = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into color (color) ";
		$sql .= "value (\"$this->color\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ColorData previamente utilizamos el contexto
	public function update(){	
		$sql = "update ".self::$tablename." set color=\"$this->color\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ColorData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColorData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where color like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColorData());
	}


}

?>