<?php 

$precio=PrecioData::delById($_POST["id"]);

core::redir("./?view=Precio/AddPrecio");

?>