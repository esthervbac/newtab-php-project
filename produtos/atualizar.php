<?php
include '../controllers/produtoController.php';
$obj = new produtoController();
$obj->atualizar($_POST['id'], $_POST['nomeproduto'], $_POST['valorunitario'], $_POST['codigobarras']);
?>;