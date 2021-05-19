<?php
class GymData
 {
	public static $tablename = "gym";


	public function GymData(){
		$this->id = ""; 
        $this->nombre = "";
        $this->idadmin ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (nombre,idadmin) ";
		$sql .= "value (\"$this->nombre\",\"$this->idadmin\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set
        nombre=\"$this->nombre\",
        idadmin=\"$this->idadmin\"
        where id=$this->id";
		return Executor::doit($sql);
	}


	public static function getAll(){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = "select * from ".self::$tablename." where idgym='".$gym->id."' order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GymData());

		}else if ($user->rol==1) {

			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new GymData());
		}
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GymData());

	}

	public static function getByIdUser($id){
		$sql = "select * from ".self::$tablename." where idadmin='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GymData());
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