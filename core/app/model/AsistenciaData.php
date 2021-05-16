<?php
class AsistenciaData
 {
	public static $tablename = "asistencia";


	public function AsistenciaData(){
		$this->id = ""; 
        $this->idcliente = "";
        $this->fechainicio = "";
		$this->fechafin = "";
        $this->idgym ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idcliente,fechainicio,fechafin,idgym,) ";
		$sql .= "value (\"$this->idcliente\",\"$this->fechainicio\",\"$this->fechafin\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        idcliente=\"$this->idcliente\", 
        fechainicio=\"$this->fechainicio\", 
		fechafin=\"$this->fechafin\", 
        idgym=\"$this->idgym\" 
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsistenciaData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AsistenciaData());

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