<?php
class ClienteData
 {
	public static $tablename = "cliente";


	public function ClienteData(){
		$this->id = ""; 
        $this->cedula = "";
        $this->nombre = "";
		$this->apellido = "";
		$this->telefono = "";
        $this->idgym ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (telefono,cedula,nombre,apellido,idgym) ";
		$sql .= "value (\"$this->telefono\",\"$this->cedula\",\"$this->nombre\",\"$this->apellido\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        cedula=\"$this->cedula\", 
        nombre=\"$this->nombre\",
		apellido=\"$this->apellido\", 
		telefono=\"$this->telefono\", 
        idgym=\"$this->idgym\" 
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClienteData());

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