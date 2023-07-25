<?php
include '../controllers/clienteController.php';
$obj = new clienteController();
$obj->atualizar($_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['email']);
?>;