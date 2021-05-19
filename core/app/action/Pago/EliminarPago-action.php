<?php 

$pago=PagoData::delById($_POST["id"]);

core::redir("./?view=Pago/ViewPago");

?>