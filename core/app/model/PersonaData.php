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
		$this->idgym = "";
		$this->rol="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (cedula,nombre,apellido,telefono,rol,idgym) ";
		$sql .= "value (\"$this->cedula\",\"$this->nombre\",\"$this->apellido\",\"$this->telefono\",\"$this->rol\",\"$this->idgym\")";
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
		
		$user = UserData::getById($_SESSION["user_id"]);
		$gym=GymData::getByIdUser($user->id);

		if($gym==null && $user->rol==1){

			$sql = "select * from ".self::$tablename."  order by id desc";
		
		}else{

			$sql = "select * from ".self::$tablename." where idgym='".$gym->id."' order by id desc";
		}

		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonaData());
	}


    public static function getById($id){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym=GymData::getByIdUser($user->id);

		if($gym==null && $user->rol==1){

			$sql = "select * from ".self::$tablename." where id='".$id."' ";

		}else{

			$sql = "select * from ".self::$tablename." where id='".$id."' AND '".$gym->id."' ";
		}

		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonaData());
	}

	
    public static function getByIdCliente($id){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym=GymData::getByIdUser($user->id);

		if($gym==null && $user->rol==1){

			$sql = "select * from ".self::$tablename." where idcliente=".$id."";

		}else{

			$sql = "select * from ".self::$tablename." where idcliente='".$id."' AND '".$gym->id."' ";
		}	

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