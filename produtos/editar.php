<?php
session_start();
include '../includes/nav/nav.php';
include '../controllers/produtoController.php';
$obj = new produtoController();
$data = $obj->mostrarProdutos($_GET['id']);

$valorUnitarioFormatado = number_format($data[2] / 100, 2, ",", ".");

?>
<div class="container-fluid">
    <form action="atualizar.php" method="POST" autocomplete="off">
        <div class="pb-3 pt-3">
            <a href="/newtab-projeto-php-individual" class="btn btn-primary">Voltar</a>
        </div>
        <h2 class="text-center pb-3">Editar Cadastro do Produto</h2>
        <br>
        <?php if (isset($_SESSION['messagecodigobarras'])) : ?>
            <h5 class="alert alert-danger">
                <?= $_SESSION['messagecodigobarras'];
                unset($_SESSION['messagecodigobarras']); ?>
            </h5>
        <?php endif; ?>
        <br>
        <?php if (isset($_SESSION['messageEdit'])) : ?>
            <h5 class="alert alert-danger">
                <?= $_SESSION['messageEdit'];
                unset($_SESSION['messageEdit']); ?>
            </h5>
        <?php endif; ?>
        <br>
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID:</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="id" name="id" value='<?= $data[0] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNameproduto3" class="col-sm-2 col-form-label">Nome do Produto:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNameproduto3" placeholder="Nome do Produto" name="nomeproduto" value='<?= $data[1] ?>' required title="Necessário preencher o campo nome do produto!">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputvalorunitario3" class="col-sm-2 col-form-label">Valor Unitário:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputvalorunitario3" placeholder="R$ 00,00" name="valorunitario" onkeypress="testaCampoValor(event)" onkeyup="formatarMoeda()" value='R$ <?= $valorUnitarioFormatado ?>' required onfocus="this.value = ''" title="Necessário preencher o campo valor unitário!">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCodigoBarras3" class="col-sm-2 col-form-label">Código de Barras:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCodigoBarras3" placeholder="###-###" name="codigobarras" value='<?= $data[3] ?>' required title="Necessário preencher o campo código de barras!">
            </div>
        </div>
        <div>
            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Atualizar">
            <a class="btn btn-danger" href='mostrar.php?id=<?= $data[0] ?>'>Cancelar</a>
        </div>
    </form>
</div>
<?php
include '../includes/footer/footer.php';
?>