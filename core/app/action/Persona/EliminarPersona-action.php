<?php 

$persona=PersonaData::delById($_POST["id"]);

core::redir("./?view=Persona/ViewPersona");

?>