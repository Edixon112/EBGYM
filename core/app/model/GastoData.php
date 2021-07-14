<?php
class GastoData
 {
	public static $tablename = "gasto";


	public function GastoData(){
		$this->id = ""; 
        $this->nombre = "";
        $this->fecha = "";
        $this->gasto ="";
		$this->idgym ="";
	}


    public function add(){
		$sql = "insert into  ".self::$tablename." (nombre,fecha,gasto,idgym) ";
		$sql .= "value (\"$this->nombre\",\"$this->fecha\",\"$this->gasto\",\"$this->idgym\")";
        return Executor::doit($sql);
	}

	
	public static function getFecha($fecha1,$fecha2){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = " select * from ".self::$tablename."  where fecha between '$fecha1' and '$fecha2' and idgym='".$gym->id."' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());

		}else if ($user->rol==1) {

			$sql = " select * from ".self::$tablename."  where fecha between '$fecha1' and '$fecha2' ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new GastoData());
		}
	}


	public function update(){
		$sql = "update ".self::$tablename." set 
        nombre=\"$this->nombre\",
		fecha=\"$this->fecha\",
        gasto=\"$this->gasto\",
		idgym=\"$this->idgym\"
        where id=$this->id";
		return Executor::doit($sql);
	}

	
    public static function getByIdGym($idgym){
		$sql = "select * from ".self::$tablename." where id='".$idgym."' ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoData());

	}

	
    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."' ";
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