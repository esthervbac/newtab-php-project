<?php
// isset -> serve para saber se uma variável está definida
include_once('config.php');
if (isset($_POST['update'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $result = $conn->query("UPDATE clientes
    SET nome_do_cliente='$nome',cpf='$cpf',email='$email'
    WHERE id_cliente=$id");
    print_r($result);
}
header('Location: /newtab-projeto-php-individual/listar-clientes.php');
