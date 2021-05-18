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
		$sql = "insert into  ".self::$tablename." (idcliente,fechainicio,idgym) ";
		$sql .= "value (\"$this->idcliente\",\"$this->fechainicio\",\"$this->idgym\")";
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


	
    public function Out(){
		$sql = "update ".self::$tablename." set
		fechafin=\"$this->fechafin\"
        where id=$this->id";
		return Executor::doit($sql);
	}



    public static function getAll(){
		
		$user = UserData::getById($_SESSION["user_id"]);
		$gym=GymData::getByIdUser($user->id);

		if($gym==null && $user->rol==1){

			$sql = "select * from ".self::$tablename."  order by id desc";
		
		}else{

			$sql = "select * from ".self::$tablename." where idgym='".$gym->id."' order by id desc";
		}

		$query = Executor::doit($sql);
		return Model::many($query[0],new AsistenciaData());
	}


    public static function getById($id){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym=GymData::getByIdUser($user->id);

		if($gym==null && $user->rol==1){

			$sql = "select * from ".self::$tablename." where id='".$id."'";

		}else{

			$sql = "select * from ".self::$tablename." where id='".$id."' AND '".$gym->id."' ";
		}

		$query = Executor::doit($sql);
		return Model::one($query[0],new AsistenciaData());

	}

	public static function getByIdClienteLibre($id){
		
		
		$sql = "select * from ".self::$tablename." where idcliente='".$id."'";
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