<?php
class UserData
 {
	public static $tablename = "user";


	public function UserData(){
		$this->id = "";
		$this->user = "";
		$this->pass = "";
        $this->rol = "";
		$this->idpersona = "";
	} 


    public function add(){
		$sql = "insert into  ".self::$tablename." (user,pass,rol,idpersona) ";
		$sql .= "value (\"$this->user\",\"$this->pass\",\"$this->rol\",\"$this->idpersona\")";
        return Executor::doit($sql);
	}


    public function update(){
		$sql = "update ".self::$tablename." set 
        pass=\"$this->pass\", 
        rol=\"$this->rol\", 
		user=\"$this->user\"
        where id=$this->id";
		return Executor::doit($sql);
	}


    public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

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