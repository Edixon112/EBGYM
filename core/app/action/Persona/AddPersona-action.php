 <?php
$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);

$revisar=PersonaData::getByTel($_POST["telefono"]);

if($revisar==null){

   $persona = new PersonaData();

   $persona->nombre=$_POST["nombre"];
   $persona->apellido=$_POST["apellido"];
   $persona->telefono=$_POST["telefono"];
   $persona->cedula=$_POST["cedula"];
   $persona->rol=$_POST["rol"];
   
   
   $aux=$persona->add();
   
   $personagym = new Persona_GymData();
   $personagym->idpersona=$aux[1];
   
   $lol=$aux[1];
   $personagym->idgym=$gym->id;
   $personagym->add();
   
   
   $plan= New PlanData();
   
   
   $plan->idcliente=$aux[1];
   $plan->idprecio=$_POST["precio"];
   $plan->idgym=$gym->id;
   
   $Aux2=$plan->add();
   
   
   
   if($Aux2[0]==1){
   
      /*$api = ApiData::getInstance();
      $nombre = $_POST["nombre"];
      $gyms = $gym->nombre;
      $celular = $_POST["telefono"];
   
      $mensaje = "*" . $nombre . "* BIENVENIDO/A AL GYM *" . $gyms . "*";
   
      $api->enviarMensajeGeneral($mensaje,$celular);*/
   
       core::alert("Registro Exitoso");
      
       core::redir("./?view=Persona/ViewPersona");
    
    }else{
    
       core::alert("Error al Registrar");
    
       core::redir("./?view=Persona/ViewPersona");
    }
   

}else{

   core::alert("Existe Un Cliente Con Esta Identificacion");
    

   core::redir("./?view=Persona/AddPersona");

}
?>