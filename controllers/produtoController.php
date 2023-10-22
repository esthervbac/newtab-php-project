<?php
class produtoController
{
    private $model;
    public function __construct()
    {
        include '../models/produtoModel.php';
        $this->model = new produtoModel();
    }
    public function guardarProdutos($nomeproduto, $valorunitario, $codigobarras)
    {
        session_start();

        $valorunitario_value_sented = trim($valorunitario); //retirando os espaços, pontos e vírgula do valor unitário do produto
        $valorunitario_value = str_replace(array('.', ','), "", $valorunitario_value_sented); //retirando os espaços, pontos e traços do valor unitário do produto

        $id = $this->model->inserirProdutos($nomeproduto, $valorunitario_value, $codigobarras);
        if ($id != false) {
            $_SESSION['message'] = "Cadastro realizado com sucesso!";
            header("Location:mostrar.php?id=" . $id);
            exit(0);
        } else {
            $_SESSION['message'] = "Erro: Cadastro não realizado corretamente!";
            header("Location:cadastrar.php");
            exit(0);
        }
    }
    public function mostrarProdutos($id)
    {
        return ($this->model->mostrarProdutos($id) != false) ? $this->model->mostrarProdutos($id) : header("Location: index.php");
    }
    public function listarProdutos()
    {
        return ($this->model->listarProdutos()) ? $this->model->listarProdutos() : false;
    }
    public function atualizarProdutos($id, $nomeproduto, $valorunitario, $codigobarras)
    {
        session_start();

        $valorunitario_value_sented = trim($valorunitario); //retirando os espaços, pontos e vírgula do valor unitário do produto
        $valorunitario_value = str_replace(array('.', ','), "", $valorunitario_value_sented); //retirando os espaços, pontos e traços do valor unitário do produto

        $editar = $this->model->atualizarProdutos($id, $nomeproduto, $valorunitario_value, $codigobarras);
        if ($editar != false) {
            $_SESSION['messageEdit'] = "Cadastro atualizado com sucesso!";
            header("Location:mostrar.php?id=" . $id);
            exit(0);
        } else {
            $_SESSION['messageEdit'] = "Erro: Cadastro não atualizado corretamente!";
            header("Location:editar.php?id=" . $id);
            exit(0);
        }
    }
    public function deletarProdutos($id)
    {
        return ($this->model->deletarProdutos($id)) ? header("Location:listar.php") : header("Location:mostrar.php?id=" . $id);
    }
}
