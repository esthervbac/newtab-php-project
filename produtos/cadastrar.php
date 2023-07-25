<?php
session_start();
include '../includes/nav/nav.php';
?>

<div class="container">
    <h1 class="pt-3">Cadastrar Produtos</h1>
    <br>
    <?php if (isset($_SESSION['messagecodigobarra'])) : ?>
        <h5 class="alert alert-danger">
            <?= $_SESSION['messagecodigobarra'];
            unset($_SESSION['messagecodigobarra']); ?>
        </h5>
    <?php endif; ?>
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
            <label for="inputNameProduto3" class="col-sm-2 col-form-label">Nome do Produto:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNameProduto3" placeholder="Nome do Produto" name="nomeproduto" required title="Necessário preencher o campo nome do produto!">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputvalorunitario3" class="col-sm-2 col-form-label">Valor Unitário:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputvalorunitario3" placeholder="R$ 00,00" name="valorunitario" onkeypress="testaCampoValor(event)" onkeyup="formatarMoeda()" value="" required onfocus="this.value = ''" required title="Necessário preencher o campo valor unitário!">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCodigBarras3" class="col-sm-2 col-form-label">Código de Barras:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCodigBarras3" placeholder="###-###" name="codigobarras" required title="Necessário preencher o campo código de barras!">
            </div>
        </div>
        <input type="submit" name="submit" id="submit" class="btn btn-primary">
        <a class="btn btn-danger" href="../index.php">Cancelar</a>
    </form>
</div>
<?php
include '../includes/footer/footer.php';
?>