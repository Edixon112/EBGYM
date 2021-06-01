<?php

$gym = new GymData();

$gym->nombre = $_POST["nombre"];
$gym->idadmin = $_POST["admin"];
$aux = $gym->add();

if ($aux[0] == 1) {

    core::alert("Gym Registrado");

    core::redir("./?view=Gym/ViewGym");
} else {

    core::alert("Error al Registrar Gym");

    core::redir("./?view=Gym/ViewGym");
}
