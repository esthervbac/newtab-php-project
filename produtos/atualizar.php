<?php
include '../controllers/produtoController.php';
$obj = new produtoController();
$obj->atualizarProdutos($_POST['id'], $_POST['nomeproduto'], $_POST['valorunitario'], $_POST['codigobarras']);
?>