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
		$sql = "select * from ".self::$tablename."  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."' ";
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