<?php
include '../controllers/produtoController.php';
$obj = new produtoController();
$obj->guardarProdutos($_POST['nomeproduto'], $_POST['valorunitario'], $_POST['codigobarras']);
?>;