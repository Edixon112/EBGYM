<?php
class PagoData
 {
	public static $tablename = "pago";


	public function PagoData(){
		$this->id = ""; 
        $this->idcliente = "";
        $this->idgym ="";
        $this->fechainicio ="";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idcliente,fechainicio,idgym) ";
		$sql .= "value (\"$this->idcliente\",\"$this->fechainicio\",\"$this->idgym\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        idcliente=\"$this->idcliente\",  
        idgym=\"$this->idgym\",
        fecha=\"$this->fecha\" 
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


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."' ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoData());

	}


	public static function getByIdCliente($id){
		$sql = "select * from ".self::$tablename." where idcliente='".$id."' ";
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