<?php
class PersonaData
 {
	public static $tablename = "persona";


	public function PersonaData(){
		$this->id = ""; 
		$this->cedula = "";
		$this->nombre = "";
        $this->apelido = "";
        $this->telefono = "";
	
		$this->rol="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (cedula,nombre,apellido,telefono,rol) ";
		$sql .= "value (\"$this->cedula\",\"$this->nombre\",\"$this->apellido\",\"$this->telefono\",\"$this->rol\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        nombre=\"$this->nombre\", 
        apelido=\"$this->apellido\", 
		cedula=\"$this->cedula\",
		cedula=\"$this->telefono\"
        where id=$this->id";
		return Executor::doit($sql);
	}


	public static function getAll(){

		
		$sql = "select * from ".self::$tablename." where order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonaData());

	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."' ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonaData());
	}

	
    public static function getByIdCliente($id){
		$sql = "select * from ".self::$tablename." where idcliente=".$id."";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonaData());

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