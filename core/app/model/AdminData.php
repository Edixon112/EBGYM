<?php
class AdminData
 {
	public static $tablename = "admin";


	public function AdminData(){
		$this->id = ""; 
        $this->cedula = "";
        $this->nombre = "";
		$this->telefono = "";
        $this->idgym ="";
        $this->tipo ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (telefono,cedula,nombre,idgym,tipo) ";
		$sql .= "value (\"$this->telefono\",\"$this->cedula\",\"$this->nombre\",\"$this->idgym\",\"$this->tipo\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        cedula=\"$this->cedula\", 
        nombre=\"$this->nombre\", 
		telefono=\"$this->telefono\", 
        idgym=\"$this->idgym\",
        tipo=\"$this->tipo\" 
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AdminData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AdminData());

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