<?php
require 'c://xampp/htdocs/newtab-projeto-php-individual/controllers/clienteController.php';
$obj = new clienteController();
$obj->deletar($_GET['id']);
