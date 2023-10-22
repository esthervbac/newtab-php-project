<?php
include '../controllers/pedidoController.php';
$obj = new pedidoController();
$obj->guardar($_POST['nomecliente'], $_POST['totalpedido'], $_POST['statuspedido']);
?>;