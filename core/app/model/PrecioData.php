<?php
class PrecioData
 {
	public static $tablename ="precio";


	public function PrecioData(){
		$this->id = ""; 
        $this->nombre = "";
		$this->precio = "";
        $this->idgym ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (nombre,idgym,precio) ";
		$sql .= "value (\"$this->nombre\",\"$this->idgym\",\"$this->precio\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        nombre=\"$this->nombre\", 
        precio=\"$this->precio\",
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
			return Model::many($query[0],new PrecioData());

		}elseif ($user->rol==1) {

			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PlanData());
		}
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."' ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PrecioData());
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