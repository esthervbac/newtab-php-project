<?php
session_start();
include '../includes/nav/nav.php';
include '../controllers/clienteController.php';
$obj = new clienteController();
$linhas = $obj->listar();
?>

<div class="container">
    <h1 class="pt-3">Cadastrar Pedido</h1>
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
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="inputId3" name="id">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNameCliente3" class="col-sm-2 col-form-label">Nome do Cliente:</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="inputNameCliente3" name="nomecliente" required title="Necessário escolher o nome do cliente!">
                    <option selected>Escolha o cliente</option>
                    <?php if ($linhas) : ?>
                        <?php foreach ($linhas as $linha) :
                        ?>
                            <option value="<?= $linha[0] ?>"><?= $linha[1] ?></option>
                        <?php endforeach; ?>

                    <?php else : ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="inputtotal3" name="totalpedido" value="0,00">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="inputstatuspedido3" name="statuspedido" value="ABERTO">
            </div>
        </div>
        <input type="submit" name="submit" id="submit" class="btn btn-primary">
        <a class="btn btn-danger" href="../index.php">Cancelar</a>
    </form>
</div>
<?php
include '../includes/footer/footer.php';
?>