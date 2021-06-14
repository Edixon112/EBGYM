<?php
class ApiData
{
	public static $tablename = "api";


	public function ApiData(){
		$this->id = ""; 
        $this->token = "";
        $this->instanceid = "";
		$this->telefono = "";
        $this->idgym ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (token,instanceid,telefono,idgym) ";
		$sql .= "value (\"$this->token\",\"$this->instanceid\",\"$this->telefono\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        token=\"$this->token\", 
        instanceid=\"$this->instanceid\", 
        telefono=\"$this->telefono\",
		idgym=\"$this->idgym\"
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ApiData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ApiData());
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