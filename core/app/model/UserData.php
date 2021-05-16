<?php
class UserData
 {
	public static $tablename = "user";


	public function UserData(){
		$this->id = ""; 
        $this->idcliente = "";
        $this->identrenador = "";
		$this->idadmin = "";
        $this->idgym ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idcliente,identrenador,idadmin,idgym,) ";
		$sql .= "value (\"$this->idcliente\",\"$this->identrenador\",\"$this->idadmin\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        identrenador=\"$this->identrenador\", 
        idadmin=\"$this->idadmin\", 
		idcliente=\"$this->idcliente\", 
        idgym=\"$this->idgym\",
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

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