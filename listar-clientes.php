<?php
include("nav.php");
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>>> PESQUISAR CLIENTES <<< </title>
</head>

<body>
    <div class="container">
        <h1>Listagem de Clientes Cadastrados</h1>
        <br>
        <br>
        <div class="input-group">
            <input type="search" id="search" class="form-control rounded" placeholder="Pesquisar" aria-label="Search" aria-describedby="search-addon" />
            <button onclick="searchData()" type="button" class="btn btn-outline-primary">Pesquisar</button>
        </div>

        <br>
        <br>
        <div class="col">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6" flex>
                        <div class="dataTables_length" id="example_length" flex>
                            <label flex>Mostre
                                <select name="example_length" flex aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">20</option>
                                    <option value="25">40</option>
                                    <option value="50">60</option>
                                    <option value="50">80</option>
                                    <option value="100">100</option>
                                </select> entradas
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table dataTable" style="width:100%" aria-describedby="example_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#ID: activate to sort column descending" style="width: 131.422px;">#ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nome do Cliente: activate to sort column ascending" style="width: 217.078px;">Nome do Cliente</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 97.75px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CPF: activate to sort column ascending" style="width: 36.5px;">CPF</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Data de Cadastro: activate to sort column ascending" style="width: 79.5px;">Data de Cadastro</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 74.4531px;">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($_GET['search'])) {
                                    $data = $_GET['search'];
                                    $result = $conn->query("SELECT * FROM clientes WHERE id_cliente LIKE '%$data%' or nome_do_cliente LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or data_cadastro LIKE '%$data%' ORDER BY id_cliente ASC");
                                } else {
                                    $result = $conn->query("SELECT * FROM clientes ORDER BY id_cliente ASC");
                                }
                                $result->execute();
                                while ($cliente_data = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $cliente_data['id_cliente'] . "</td>";
                                    echo "<td>" . $cliente_data['nome_do_cliente'] . "</td>";
                                    echo "<td>" . $cliente_data['email'] . "</td>";
                                    echo "<td>" . $cliente_data['cpf'] . "</td>";
                                    echo "<td>" . $cliente_data['data_cadastro'] . "</td>";
                                    echo "<td>
                            <a class='btn btn-sm btn-primary' href='editar-clientes.php?id=$cliente_data[id_cliente]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                            </svg>
                            </a>
                            </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example_previous"><a aria-controls="example" aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="0" class="page-link">Anterior</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example" aria-role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" aria-role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" aria-role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" aria-role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" aria-role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" aria-role="link" data-dt-idx="5" tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" aria-role="link" data-dt-idx="next" tabindex="0" class="page-link">Próximo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap -->
    <script>
        const search = document.getElementById('search');
        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 'listar-clientes.php?search=' + search.value;
        }
    </script>
    <script>
        $('#example').DataTable();
    </script>
    <!-- scripts -->
</body>

</html>