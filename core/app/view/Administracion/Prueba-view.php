<?php

$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);

//$abono = AbonoData::getByIdGym($gym->id);

$fechainiciopost = $_POST["fechainicio"];

$fechafinpost = $_POST["fechafin"];


$fecha1 = date_format(date_create($fechainiciopost) , 'Y-m-d H:i:s');
$fecha2 = date_format(date_create($fechafinpost) , 'Y-m-d H:i:s');

$abono=AbonoData::getFecha($fecha1,$fecha2);
$sumaTotal=0;

foreach($abono as $abono){
    echo $abono->id."   -  >>>  ";
echo $abono->monto."<br>"."<br>";
   echo "total". $sumaTotal=($sumaTotal)+($abono->monto);
   echo "<br>";
}

echo "monto recaudado entre las fechas es ".$sumaTotal;

