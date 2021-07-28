<?php
class InscripcionData
 {
	public static $tablename = "inscripcion";


	public function InscripcionData(){
		$this->id = ""; 
        $this->monto = "";
        $this->fecha = "";
        $this->idcliente ="";
		$this->idgym ="";
	}


    public function add(){
		$sql = "insert into  ".self::$tablename." (monto,fecha,idcliente,idgym) ";
		$sql .= "value (\"$this->monto\",\"$this->fecha\",\"$this->idcliente\",\"$this->idgym\")";
        return Executor::doit($sql);
	}

	
	public static function getAll(){

		$user = UserData::getById($_SESSION["user_id"]);
		$gym = GymData::getByIdUser($user->id);

		
		if(($user->rol==2 && $gym!=null)) {
				
		$sql = " select * from ".self::$tablename."  where idgym='".$gym->id."' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new InscripcionData());

		}else if ($user->rol==1) {

			$sql = " select * from ".self::$tablename." ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new InscripcionData());
		}
	}


	public function update(){
		$sql = "update ".self::$tablename." set 
        monto=\"$this->monto\",
		fecha=\"$this->fecha\",
        idcliente=\"$this->idcliente\",
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