<?php
include '../controllers/produtoController.php';
$obj = new produtoController();
$obj->deletar($_GET['id']);
?>;