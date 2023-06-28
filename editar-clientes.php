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

        $result = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($_GET['id_cliente'])) {
            $id = $_GET['id_cliente'];
            $result = $conn->query("SELECT * FROM clientes WHERE id_cliente=$id");
            $result->execute();

            if ($result->rowCount() > 0) {
                $result = $conn->prepare($query_result);
                $result->bindParam(':nome', $result['nome'], PDO::PARAM_STR);
                $result->bindParam(':email', $result['email'], PDO::PARAM_STR);
                $result->bindParam(':cpf', $result['cpf'], PDO::PARAM_STR);

                $result->execute();

                while ($cliente_edit = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $cliente_edit['nome_do_cliente'] . "</td>";
                    echo "<td>" . $cliente_edit['email'] . "</td>";
                    echo "<td>" . $cliente_edit['cpf'] . "</td>";
                    echo "</tr>";
                }
            } else {
                header('Location: /newtab-projeto-php-individual/listar-clientes.php');
            }

            //validação dos campos individualmente
            if (empty($result['nome'])) {
                echo "<p style='color:#f00;'>Erro: Necessário preencher o campo nome!</p>";
            } elseif (empty($result['cpf'])) {
                echo "<p style='color:#f00;'>Erro: Necessário preencher o campo CPF!</p>";
            } elseif (empty($result['email'])) {
                echo "<p style='color:#f00;'>Erro: Necessário preencher o campo email!</p>";
            } else {
                $query_result = "INSERT INTO clientes(nome_do_cliente, cpf, email) 
                VALUES (:nome, :cpf, :email)";
                $result = $conn->prepare($query_result);
                $result->bindParam(':nome', $result['nome'], PDO::PARAM_STR);
                $result->bindParam(':email', $result['email'], PDO::PARAM_STR);
                $result->bindParam(':cpf', $result['cpf'], PDO::PARAM_STR);

                $result->execute();

                if ($result->rowCount()) {
                    unset($result);
                    echo "<p style='color: green;'>Mensagem enviada com sucesso!</p>";
                } else {
                    echo "<p style='color: #f00;'>Erro: Mensagem não enviada com sucesso!</p>";
                }
            }
        }
        ?>
        <br>
        <form action="cadastrar-clientes.php" method="POST">
            <?php
            $nome = "";
            if (isset($result['nome'])) {
                $nome = $result['nome'];
            } ?>
            <div class="form-group row">
                <label for="inputName3" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputName3" placeholder="Nome" name="nome" value="<?php echo $nome; ?>">
                </div>
            </div>
            <?php
            $email = "";
            if (isset($result['email'])) {
                $email = $result['email'];
            } ?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?php echo $email; ?>" oninput="validaEmail(this)">
                </div>
            </div>
            <?php
            $cpf = "";
            if (isset($result['cpf'])) {
                $cpf = $result['cpf'];
            } ?>
            <div class="form-group row">
                <label for="inputCpf3" class="col-sm-2 col-form-label">CPF:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCpf3" placeholder="000.000.000-00" name="cpf" value="<?php echo $cpf; ?>">
                </div>
            </div>
            <input type="submit" name="submit" id="submit" class="btn btn-primary">
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