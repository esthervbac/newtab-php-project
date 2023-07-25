<?php
include '../controllers/produtoController.php';
$obj = new produtoController();
$obj->guardar($_POST['nomeproduto'], $_POST['valorunitario'], $_POST['codigobarras']);
?>;