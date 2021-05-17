<?php 

$admin=AdminData::delById($_POST["id"]);

core::redir("./?view=Admin/ViewAdmin");

?>