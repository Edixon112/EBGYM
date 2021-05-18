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
		
		$sql = "select * from ".self::$tablename."  order by id desc";
		
	

		$query = Executor::doit($sql);
		return Model::many($query[0],new PrecioData());
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