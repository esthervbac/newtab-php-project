<?php
include '../controllers/clienteController.php';
$obj = new clienteController();
$obj->deletar($_GET['id']);
?>;