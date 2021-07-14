<?php 
$user = UserData::getById($_SESSION["user_id"]);


$cliente = PersonaData::getById($user->idpersona);
$api = ApiData::getInstance();
$celular = $cliente->telefono;



$api->SendFilePdf("573015256417");