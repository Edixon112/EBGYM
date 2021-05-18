<?php
class PagoData
 {
	public static $tablename = "pago";


	public function PagoData(){
		$this->id = ""; 
        $this->idcliente = "";
		$this->idasistencia=null;
        $this->idgym ="";
        $this->fechainicio ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idcliente,fechainicio,idasistencia,idgym) ";
		$sql .= "value (\"$this->idcliente\",\"$this->fechainicio\",\"$this->idasistencia\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        idcliente=\"$this->idcliente\", 
        monto=\"$this->monto\", 
        idgym=\"$this->idgym\",
        fecha=\"$this->fecha\" 
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
		return Model::many($query[0],new PagoData());
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
		return Model::one($query[0],new PagoData());

	}

	public static function getByIdAsistencia($id){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym=GymData::getByIdUser($user->id);

		if($gym==null && $user->rol==1){

		$sql = "select * from ".self::$tablename." where idasistencia='".$id."' ";

		}else{

			$sql = "select * from ".self::$tablename." where idasistencia='".$id."' AND '".$gym->id."' ";

		}
		

		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoData());

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