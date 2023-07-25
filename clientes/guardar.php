<?php
include '../controllers/clienteController.php';
$obj = new clienteController();
$obj->guardar($_POST['nome'], $_POST['cpf'], $_POST['email']);
?>;