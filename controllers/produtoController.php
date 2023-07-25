<?php
class produtoController
{
    private $model;
    public function __construct()
    {
        include '../models/produtoModel.php';
        $this->model = new produtoModel();
    }
    public function guardar($nomeproduto, $valorunitario, $codigobarras)
    {
        session_start();

        $valorunitario_value_sented = trim($valorunitario); //retirando os espaços, pontos e vírgula do valor unitário do produto
        $valorunitario_value = str_replace(array('.', ','), "", $valorunitario_value_sented); //retirando os espaços, pontos e traços do valor unitário do produto

        $id = $this->model->inserir($nomeproduto, $valorunitario_value, $codigobarras);
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
    public function mostrar($id)
    {
        return ($this->model->mostrar($id) != false) ? $this->model->mostrar($id) : header("Location: index.php");
    }
    public function listar()
    {
        return ($this->model->listar()) ? $this->model->listar() : false;
    }
    public function atualizar($id, $nomeproduto, $valorunitario, $codigobarras)
    {
        session_start();

        $valorunitario_value_sented = trim($valorunitario); //retirando os espaços, pontos e vírgula do valor unitário do produto
        $valorunitario_value = str_replace(array('.', ','), "", $valorunitario_value_sented); //retirando os espaços, pontos e traços do valor unitário do produto

        $editar = $this->model->atualizar($id, $nomeproduto, $valorunitario_value, $codigobarras);
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
    public function deletar($id)
    {
        return ($this->model->deletar($id)) ? header("Location:listar.php") : header("Location:mostrar.php?id=" . $id);
    }
}
