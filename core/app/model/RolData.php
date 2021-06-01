<?php
class RolData
 {
	public static $tablename = "rol";


	public function RolData(){
		$this->id = ""; 
        $this->nombre = "";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (nombre) ";
		$sql .= "value (\"$this->nombre\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        nombre=\"$this->nombre\"
        where id=$this->id";
		return Executor::doit($sql);
	}


	public static function getAll(){		
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RolData());

	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RolData());

	}


    public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}


    public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return	Executor::doit($sql);
	}    
}