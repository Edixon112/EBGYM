<?php
class PlanData
 {
	public static $tablename = "plan";


	public function PlanData(){
		$this->id = ""; 
        $this->idcliente = "";
        $this->idprecio = "";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (idcliente,idprecio) ";
		$sql .= "value (\"$this->idcliente\",\"$this->idprecio\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        idcliente=\"$this->idcliente\", 
        idprecio=\"$this->idprecio\" 
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PlanData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PlanData());

	}

	public static function getByIdCliente($id){
		$sql = "select * from ".self::$tablename." where idcliente='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PlanData());

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