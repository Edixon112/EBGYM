<?php
class Persona_GymData
 {
	public static $tablename = "persona_gym";


	public function Persona_GymData(){
		$this->id = ""; 
        $this->idpersona = "";
        $this->idgym ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idpersona,idgym) ";
		$sql .= "value (\"$this->idpersona\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set
        idpersona=\"$this->idpersona\",
        idgym=\"$this->idgym\"
        where id=$this->id";
		return Executor::doit($sql);
	}


	public static function getAll(){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = "select * from ".self::$tablename." where idgym='".$gym->id."' order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Persona_GymData());

		}else if ($user->rol==1) {

			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new Persona_GymData());
		}
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Persona_GymData());

	}


	public static function getByIdPersona($id){
		$sql = "select * from ".self::$tablename." where idpersona='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Persona_GymData());
	}

    
	public static function getByIdUser($id){
		$sql = "select * from ".self::$tablename." where idgym='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Persona_GymData());
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