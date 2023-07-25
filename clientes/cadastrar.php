<?php
session_start();
include '../includes/nav/nav.php';
?>

<div class="container">
    <h1 class="pt-3">Cadastrar Clientes</h1>
    <br>
    <?php if (isset($_SESSION['message'])) : ?>
        <h5 class="alert alert-danger">
            <?= $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </h5>
    <?php endif; ?>
    <br>
    <form action="guardar.php" method="POST" autocomplete="off">
        <div class="form-group row">
            <label for="inputName3" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" placeholder="Nome" name="nome" required title="Necessário preencher o campo nome!">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCpf3" class="col-sm-2 col-form-label">CPF:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCpf3" placeholder="000.000.000-00" name="cpf" required title="Necessário preencher o campo CPF!">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email" required title="Necessário preencher o campo email!" oninput="validaEmail(this)">
            </div>
        </div>
        <input type="submit" name="submit" id="submit" class="btn btn-primary">
        <a class="btn btn-danger" href="../index.php">Cancelar</a>
    </form>
</div>
<?php
include '../includes/footer/footer.php';
?>