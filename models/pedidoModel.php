<?php
class pedidoModel
{
    private $PDO;
    public function __construct()
    {
        include '../conexaobd/conexaobd.php';
        $conn = new db();
        $this->PDO = $conn->conexao();
    }
    public function inserir_pedido($nomedocliente, $totalpedido, $statuspedido)
    {
        $nomedocliente = $_POST['nomecliente'];
        $totalpedido = $_POST['totalpedido'];
        $statuspedido = $_POST['statuspedido'];
        $query = $this->PDO->prepare("INSERT INTO pedidos (cliente_pedido, total, status_pedido) VALUES(:nomedocliente,:totalpedido,:statuspedido)");
        $query->bindParam(":nomedocliente", $nomedocliente);
        $query->bindParam(":totalpedido", $totalpedido);
        $query->bindParam(":statuspedido", $statuspedido);
        return ($query->execute()) ? $this->PDO->lastInsertId() : false;
    }
    public function mostrar($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM pedidos WHERE id_pedido = :id LIMIT 1");
        $query->bindParam(":id", $id);
        return ($query->execute()) ? $query->fetch() : false;
    }
    public function listar()
    {
        if (!empty($_GET['search'])) {
            $data = $_GET['search'];
            $query = $this->PDO->prepare("SELECT * FROM pedidos WHERE id_pedido LIKE '%$data%' or data_pedido LIKE '%$data%' or id_cliente_pedido LIKE '%$data%' or cliente_pedido LIKE '%$data%' or total LIKE '%$data%' or status_pedido LIKE '%$data%' ORDER BY id_pedido DESC");
        } else {
            $query = $this->PDO->prepare("SELECT * FROM pedidos ORDER BY id_pedido DESC");
        }
        return ($query->execute()) ? $query->fetchAll() : false;
    }
    public function atualizar($id, $nomepedido, $statuspedido)
    {
        $query = $this->PDO->prepare("UPDATE pedidos SET cliente_pedido = :nomedocliente, status_pedido = :statuspedido WHERE id_pedido = :id");
        $query->bindParam(":id", $id);
        $query->bindParam(":nomedocliente", $nomepedido);
        $query->bindParam(":statuspedido", $statuspedido);
        return ($query->execute()) ? $id : false;
    }
    public function deletar($id)
    {
        $query = $this->PDO->prepare("DELETE FROM pedidos WHERE id_pedido = :id");
        $query->bindParam(":id", $id);
        return ($query->execute()) ? true : false;
    }
}
