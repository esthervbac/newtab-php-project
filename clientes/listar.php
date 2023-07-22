<?php
session_start();
require 'c://xampp/htdocs/newtab-projeto-php-individual/componentes/nav/nav.php';
require 'c://xampp/htdocs/newtab-projeto-php-individual/controllers/clienteController.php';
$obj = new clienteController();
$linhas = $obj->listar();

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
        <a href="/newtab-projeto-php-individual" class="btn btn-primary">Voltar</a>
    </div>
    <h2 class="text-center pb-3">Listagem de Clientes Cadastrados</h2>
    <br>
    <br>
    <div class="input-group">
        <input type="search" id="search" class="form-control rounded" placeholder="Pesquisar" aria-label="Search" aria-describedby="search-addon" autocomplete="off" />
        <button onclick="searchData()" type="button" class="btn btn-outline-primary">Pesquisar</button>
    </div>
    <br>
    <br>
    <table id="example" class="table table-striped table-bordered container-fluid" style="width:100%">
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
            <?php if ($linhas) : ?>
                <?php foreach ($linhas as $linha) :
                    $cpfAtual = $linha[2];
                ?>
                    <tr>
                        <td scope="col"><?= $linha[0] ?></td>
                        <td scope="col"><?= $linha[1] ?></td>
                        <td scope="col"><?= formatCnpjCpf($cpfAtual) ?></td>
                        <td scope="col"><?= $linha[3] ?></td>
                        <td scope="col"><?= $linha[4] ?></td>
                        <td scope="col">
                            <a class='btn btn-sm btn-primary' href='mostrar.php?id=<?= $linha[0] ?>'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z' />
                                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z' />
                                </svg>
                            </a>
                            <a class='btn btn-sm btn-success' href='editar.php?id=<?= $linha[0] ?>'>
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
                                            <a href="deletar.php?id=<?= $linha[0] ?>" class="btn btn-danger">Deletar</a>
                                            <!-- <button type="button" class="btn btn-danger">Deletar</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Não existem registros</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>

</div>
<!-- scripts -->
<script>
    const search = document.getElementById('search');
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'listar.php?search=' + search.value;
    }
</script>
<!-- scripts -->
<?php
require 'c://xampp/htdocs/newtab-projeto-php-individual/componentes/footer/footer.php';
?>