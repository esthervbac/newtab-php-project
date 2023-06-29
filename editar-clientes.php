<?php include("nav.php") ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>>> Editar Clientes <<< </title>
</head>

<body>
    <a style="margin:20px; top:20px" href="/newtab-projeto-php-individual/listar-clientes.php">Voltar</a>
    <div class="container">
        <h1>Editar Clientes</h1>
        <?php
        include_once("config.php");

        $id = filter_input(INPUT_GET, "id_cliente", FILTER_SANITIZE_NUMBER_INT);
        if (!empty($id)) {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
            // header("Location: /newtab-projeto-php-individual/listar-clientes.php");
            exit();
        }
        $result_clientes = $conn->prepare("SELECT id_cliente, nome_do_cliente, cpf, email 
        FROM clientes 
        WHERE id_cliente = :id 
        LIMIT 1");
        $result_clientes->bindParam(':id_cliente', $id, PDO::PARAM_INT);
        $result_clientes->bindParam(':nome_do_cliente', $nome, PDO::PARAM_STR);
        $result_clientes->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $result_clientes->bindParam(':email', $email, PDO::PARAM_STR);
        $result_clientes->execute();

        if (($result_clientes) and ($result_clientes->rowCount() != 0)) {
            $row_clientes = $result_clientes->fetch(PDO::FETCH_ASSOC);
            var_dump($row_clientes);
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
            // header("Location: /newtab-projeto-php-individual/listar-clientes.php");
            exit();
        }

        // if ($result->rowCount()) {
        //     while ($cliente_data = $result->fetch(PDO::FETCH_ASSOC)) {
        //         $nome = $cliente_data['nome_do_cliente'];
        //         $email = $cliente_data['email'];
        //         $cpf = $cliente_data['cpf'];
        //     }
        //     print_r($nome);
        // } else {
        //     // header('Location: /newtab-projeto-php-individual/listar-clientes.php');
        // }

        // if ($result->rowCount() > 0) {

        //     while ($cliente_edit = $result->fetch(PDO::FETCH_ASSOC)) {
        //         $nome = $cliente_edit['nome'];
        //         $email = $cliente_edit['email'];
        //         $cpf = $cliente_edit['cpf'];
        //     }
        // } else {
        //     header('Location: /newtab-projeto-php-individual/listar-clientes.php');
        // }

        //validação dos campos individualmente
        // if (empty($cliente_edit['nome'])) {
        //     echo "<p style='color:#f00;'>Erro: Necessário preencher o campo nome!</p>";
        // } elseif (empty($cliente_edit['cpf'])) {
        //     echo "<p style='color:#f00;'>Erro: Necessário preencher o campo CPF!</p>";
        // } elseif (empty($cliente_edit['email'])) {
        //     echo "<p style='color:#f00;'>Erro: Necessário preencher o campo email!</p>";
        // } 
        //     if ($result->rowCount()) {
        //         unset($result);
        //         echo "<p style='color: green;'>Mensagem enviada com sucesso!</p>";
        //     } else {
        //         echo "<p style='color: #f00;'>Erro: Mensagem não enviada com sucesso!</p>";
        //     }
        ?>
        <br>
        <form action="salvar-editar.php" method="POST">
            <div class="form-group row">
                <label for="inputName3" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputName3" placeholder="Nome" name="nome" value="<?php if (isset($row_clientes['nome'])) {
                                                                                                                        echo $row_clientes['nome'];
                                                                                                                    } ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" oninput="validaEmail(this)" value="<?php if (isset($row_clientes['email'])) {
                                                                                                                                                        echo $row_clientes['email'];
                                                                                                                                                    } ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputCpf3" class="col-sm-2 col-form-label">CPF:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCpf3" placeholder="000.000.000-00" name="cpf" value="<?php if (isset($row_clientes['cpf'])) {
                                                                                                                                echo $row_clientes['cpf'];
                                                                                                                            } ?>" />
                </div>
            </div>
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Atualizar">
        </form>
    </div>
    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $("#inputCpf3").mask("000.000.000-00");
    </script>
    <!-- scripts -->
</body>

</html>