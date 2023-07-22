<?php
session_start();
require 'c://xampp/htdocs/newtab-projeto-php-individual/componentes/nav/nav.php';
require 'c://xampp/htdocs/newtab-projeto-php-individual/controllers/clienteController.php';
$obj = new clienteController();
$data = $obj->mostrar($_GET['id']);

$cpfAtual = $data[2];
function formatCnpjCpf($cpfAtual)
{
    $CPF_LENGTH = 11;
    $cpfAtual = preg_replace("/\D/", '', $cpfAtual);

    if (strlen($cpfAtual) === $CPF_LENGTH) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpfAtual);
    }
}

?>

<div class="container-fluid">
    <div class="pb-3 pt-3">
        <a href="listar.php" class="btn btn-primary">Voltar</a>
    </div>
    <h2 class="text-center pb-3">Detalhes do Cadastro</h2>
    <br>
    <?php if (isset($_SESSION['message'])) : ?>
        <h5 class="alert alert-success">
            <?= $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </h5>
    <?php endif; ?>
    <br>
    <br>
    <?php if (isset($_SESSION['messageEdit'])) : ?>
        <h5 class="alert alert-success">
            <?= $_SESSION['messageEdit'];
            unset($_SESSION['messageEdit']); ?>
        </h5>
    <?php endif; ?>
    <br>
    <table class="table container-fluid">
        <thead>
            <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#ID: activate to sort column descending" style="width: 131.422px;">#ID</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nome do Cliente: activate to sort column ascending" style="width: 217.078px;">Nome do Cliente</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CPF: activate to sort column ascending" style="width: 36.5px;">CPF</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 97.75px;">Email</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Data de Cadastro: activate to sort column ascending" style="width: 79.5px;">Data de Cadastro</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 74.4531px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col"><?= $data[0] ?></td>
                <td scope="col"><?= $data[1] ?></td>
                <td scope="col"><?= formatCnpjCpf($cpfAtual) ?></td>
                <td scope="col"><?= $data[3] ?></td>
                <td scope="col"><?= $data[4] ?></td>
                <td scope="col">
                    <a class='btn btn-sm btn-primary' href='editar.php?id=<?= $data[0] ?>'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                        </svg>
                    </a>
                    <a class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z' />
                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z' />
                        </svg>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja deletar a conta deste cliente?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    Uma vez deletado não será possível recuperar a conta do cliente.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="deletar.php?id=<?= $data[0] ?>" class="btn btn-danger">Deletar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php
require 'c://xampp/htdocs/newtab-projeto-php-individual/componentes/footer/footer.php';
?>