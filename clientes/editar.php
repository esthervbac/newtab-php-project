<?php
session_start();
require 'c://xampp/htdocs/newtab-projeto-php-individual/componentes/nav/nav.php';
require 'c://xampp/htdocs/newtab-projeto-php-individual/controllers/clienteController.php';
$obj = new clienteController();
$data = $obj->mostrar($_GET['id']);
?>
<div class="container-fluid">
    <form action="atualizar.php" method="POST" autocomplete="off">
        <div class="pb-3 pt-3">
            <a href="/newtab-projeto-php-individual" class="btn btn-primary">Voltar</a>
        </div>
        <h2 class="text-center pb-3">Editar Cadastro do Cliente</h2>
        <br>
        <?php if (isset($_SESSION['messageEdit'])) : ?>
            <h5 class="alert alert-danger">
                <?= $_SESSION['messageEdit'];
                unset($_SESSION['messageEdit']); ?>
            </h5>
        <?php endif; ?>
        <br>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">ID:</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="id" value='<?= $data[0] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName3" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" placeholder="Nome" name="nome" value='<?= $data[1] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCpf3" class="col-sm-2 col-form-label">CPF:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCpf3" placeholder="000.000.000-00" name="cpf" value='<?= $data[2] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email" oninput="validaEmail(this)" value='<?= $data[3] ?>'>
            </div>
        </div>
        <div>
            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Atualizar">
            <a class="btn btn-danger" href='mostrar.php?id=<?= $data[0] ?>'>Cancelar</a>
        </div>
    </form>
</div>
<?php
require 'C:\xampp\htdocs\newtab-projeto-php-individual\componentes\footer\footer.php';
?>