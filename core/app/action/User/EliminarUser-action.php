<?php 

$user=UserData::delById($_POST["id"]);

core::redir("./?view=User/ViewUser");

?>