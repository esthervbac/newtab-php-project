<?php
include '../controllers/produtoController.php';
$obj = new produtoController();
$obj->deletarProdutos($_GET['id']);
?>;