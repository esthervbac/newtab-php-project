<?php
class pedidoController
{
    private $model;
    public function __construct()
    {
        include '../models/pedidoModel.php';
        $this->model = new pedidoModel();
    }
    public function guardar($nomedocliente, $totalpedido, $statuspedido)
    {
        session_start();

        $id = $this->model->inserir_pedido($nomedocliente, $totalpedido, $statuspedido);
        if ($id != false) {
            $_SESSION['message'] = "Cadastro de pedido realizado com sucesso!";
            header("Location:mostrar.php?id=" . $id);
            exit(0);
        } else {
            $_SESSION['message'] = "Erro: Cadastro de pedido não realizado corretamente!";
            header("Location:cadastrar.php");
            exit(0);
        }
    }
    public function mostrar($id)
    {
        return ($this->model->mostrar($id) != false) ? $this->model->mostrar($id) : header("Location: index.php");
    }
    public function listar()
    {
        return ($this->model->listar()) ? $this->model->listar() : false;
    }
    public function atualizar($id, $nomepedido, $statuspedido)
    {
        session_start();

        $editar = $this->model->atualizar($id, $nomepedido, $statuspedido);
        if ($editar != false) {
            $_SESSION['messageEdit'] = "Cadastro de pedido atualizado com sucesso!";
            header("Location:mostrar.php?id=" . $id);
            exit(0);
        } else {
            $_SESSION['messageEdit'] = "Erro: Cadastro de pedido não atualizado corretamente!";
            header("Location:editar.php?id=" . $id);
            exit(0);
        }
    }
    public function deletar($id)
    {
        return ($this->model->deletar($id)) ? header("Location:listar.php") : header("Location:mostrar.php?id=" . $id);
    }
}
