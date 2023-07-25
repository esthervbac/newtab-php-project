    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <!-- scripts cadastrar clientes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $("#inputCpf3").mask("000.000.000-00");
    </script>
    <!-- scripts -->
    <!-- bootstrap listar clientes -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- bootstrap -->
    <!-- scripts -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                // dom: 'lrt',
                language: {
                    pagingType: 'full_numbers',
                    info: "Mostrando _START_ de _END_ de _TOTAL_ entradas",
                    search: "",
                    searchPlaceholder: "Pesquisar",
                    paginate: {
                        first: "Primeiro",
                        last: "Último",
                        next: "Próximo",
                        previous: "Anterior"
                    },
                    sLengthMenu: "<label>Mostrar " + "<select>" +
                        "<option value='20'>20</option>" +
                        "<option value='40'>40</option>" +
                        "<option value='60'>60</option>" +
                        "<option value='80'>80</option>" +
                        "<option value='100'>100</option>" +
                        "<option value='-1'>Todos</option>" +
                        "</select>" + " Entradas</label>"
                },
                "iDisplayLength": 20,
                "dom": "<'row'<'col-lg-10 col-md-10 col-xs-12'f><'col-lg-2 col-md-2 col-xs-12'l>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });
        });
    </script>
    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Formata em estilo de moeda o valor adicionado pelo usuário enquanto ele digita -->
    <script type="text/javascript">
        function formatarMoeda() {
            var elemento = document.getElementById('inputvalorunitario3');
            var valor = elemento.value;

            valor = valor + '';
            valor = parseInt(valor.replace(/[\D]+/g, ''));
            valor = valor + '';
            valor = valor.replace(/([0-9]{2})$/g, ",$1");

            if (valor.length > 6) {
                valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }

            elemento.value = valor;
            if (valor == 'NaN') elemento.value = '';
        }
    </script>

    <!-- Verifica se apenas números podem ser inseridos nos inputs, não deixa letras serem adicionadas -->
    <script type="text/javascript">
        function testaCampoValor(e) {
            e.preventDefault()

            if ((/[0-9 -,]/g).test(e.key)) {
                e.target.value += e.key
            }
        }
    </script>

    <!-- Formata para valores sem virgulas-->
    <script type="text/javascript">
        function formatarValorReal(valor) {
            return parseFloat(valor.toString().replace('.', '').replace(',', '.'));
        }
    </script>
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
    </body>

    </html>