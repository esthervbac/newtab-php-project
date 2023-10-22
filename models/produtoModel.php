<?php
class produtoModel
{
    private $PDO;
    public function __construct()
    {
        include '../conexaobd/conexaobd.php';
        $conn = new db();
        $this->PDO = $conn->conexao();
    }
    public function inserirProdutos($nomeproduto, $valorunitario, $codigobarras)
    {
        session_start();

        $valorunitario_value_sented = trim($valorunitario); //retirando os espaços, pontos e vírgula do valor unitário do produto
        $valorunitario_value = str_replace(array('.', ','), "", $valorunitario_value_sented); //retirando os espaços, pontos e traços do valor unitário do produto

        $queryCodigoDeBarra = $this->PDO->prepare("SELECT * FROM produtos WHERE codigo_de_barra = :codigobarras");
        $queryCodigoDeBarra->bindValue(':codigobarras', $codigobarras);
        $queryCodigoDeBarra->execute();

        if ($queryCodigoDeBarra->rowCount() === 0) {

            $query = $this->PDO->prepare("INSERT INTO produtos VALUES(null,:nomeproduto,:valorunitario,:codigobarras,null)");
            $query->bindParam(":nomeproduto", $nomeproduto);
            $query->bindParam(":valorunitario", $valorunitario_value);
            $query->bindParam(":codigobarras", $codigobarras);
            return ($query->execute()) ? $this->PDO->lastInsertId() : false;
        } else {
            $_SESSION['messagecodigobarra'] = "Erro: Código de Barras já cadastrado! Escolha outro código de barras para o cadastro!";
            header("Location:cadastrar.php");
            exit(0);
        }
    }
    public function mostrarProdutos($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM produtos WHERE id_produtos = :id LIMIT 1");
        $query->bindParam(":id", $id);
        return ($query->execute()) ? $query->fetch() : false;
    }
    public function listarProdutos()
    {
        if (!empty($_GET['search'])) {
            $data = $_GET['search'];
            $query = $this->PDO->prepare("SELECT * FROM produtos WHERE id_produtos LIKE '%$data%' or nome_do_produto LIKE '%$data%' or valor_unitario LIKE '%$data%' or codigo_de_barra LIKE '%$data%' or data_cadastro_prod LIKE '%$data%' ORDER BY id_produtos DESC");
        } else {
            $query = $this->PDO->prepare("SELECT * FROM produtos ORDER BY id_produtos DESC");
        }
        return ($query->execute()) ? $query->fetchAll() : false;
    }
    public function atualizarProdutos($id, $nomeproduto, $valorunitario, $codigobarras)
    {
        session_start();

        $valorunitario_value_sented = trim($valorunitario); //retirando os espaços, pontos e vírgula do valor unitário do produto
        $valorunitario_value = str_replace(array('.', ','), "", $valorunitario_value_sented); //retirando os espaços, pontos e traços do valor unitário do produto

        $queryCodigoDeBarra = $this->PDO->prepare("SELECT 1 FROM produtos WHERE codigo_de_barra = :codigobarras AND id_produtos != :id");
        $queryCodigoDeBarra->bindValue(':codigobarras', $codigobarras);
        $queryCodigoDeBarra->bindValue(':id', $id);
        $queryCodigoDeBarra->execute();

        if ($queryCodigoDeBarra->rowCount() === 0) {

            $query = $this->PDO->prepare("UPDATE produtos SET nome_do_produto = :nomeproduto, valor_unitario = :valorunitario, codigo_de_barra = :codigobarras WHERE id_produtos = :id");
            $query->bindParam(":id", $id);
            $query->bindParam(":nomeproduto", $nomeproduto);
            $query->bindParam(":valorunitario", $valorunitario_value);
            $query->bindParam(":codigobarras", $codigobarras);
            return ($query->execute()) ? $id : false;
        } else {
            $_SESSION['messagecodigobarras'] = "Erro: Código de Barras já cadastrado! Escolha outro código de barras para atualizar o cadastro!";
            header("Location:editar.php?id=" . $id);
            exit(0);
        }
    }
    public function deletarProdutos($id)
    {
        $query = $this->PDO->prepare("DELETE FROM produtos WHERE id_produtos = :id");
        $query->bindParam(":id", $id);
        return ($query->execute()) ? true : false;
    }
}
