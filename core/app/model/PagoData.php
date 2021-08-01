<?php
class PagoData
 {
	public static $tablename = "pago";


	public function PagoData(){
		$this->id = ""; 
        $this->idcliente = "";
        $this->idgym ="";
        $this->fechainicio ="";
		$this->estado=2;
		
		$this->abono="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idcliente,fechainicio,idgym,estado,abono) ";
		$sql .= "value (\"$this->idcliente\",\"$this->fechainicio\",\"$this->idgym\",\"$this->estado\",\"$this->abono\")";
        return Executor::doit($sql);
	}


	public function updateEstado(){
		$sql = "update ".self::$tablename." set 
        estado=\"$this->estado\",
		abono=\"$this->abono\" 
        where id=$this->id";
		return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
		estado=\"$this->estado\",
        fechainicio=\"$this->fechainicio\" 
        where id=$this->id";
		return Executor::doit($sql);
	}



	public static function getAll(){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = "select * from ".self::$tablename." where idgym='".$gym->id."' order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoData());

		}else if ($user->rol==1) {

			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PagoData());
		}
	}


	
	public static function getAllMora(){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = "select * from ".self::$tablename." where idgym='".$gym->id."' and estado='2' order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoData());

		}else if ($user->rol==1) {

			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PagoData());
		}
	}


	public static function getFecha($fecha1,$fecha2){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = " select * from ".self::$tablename."  where fechainicio between '$fecha1' and '$fecha2' and idgym='".$gym->id."' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoData());

		}else if ($user->rol==1) {

			$sql = " select * from ".self::$tablename."  where fechainicio between '$fecha1' and '$fecha2' ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PagoData());
		}
	}



    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."' ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoData());

	}


	public static function getByIdCliente($id){
		$sql = "select * from ".self::$tablename." where idcliente='".$id."' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoData());

	}

	
	public static function getByIdCliente2($id){
		$sql = "select * from ".self::$tablename." where idcliente='".$id."' order by id desc limit 1 ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoData());

	}




	public static function getByIdAsistencia($id){
		$sql = "select * from ".self::$tablename." where idasistencia='".$id."' ";
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