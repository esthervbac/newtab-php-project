<?php
class clienteController
{
    private $model;
    public function __construct()
    {
        require 'c://xampp/htdocs/newtab-projeto-php-individual/models/clienteModel.php';
        $this->model = new clienteModel();
    }
    public function guardar($nome, $cpf, $email)
    {
        session_start();
        $cpf_value_sented = trim($cpf); //retirando os espaços, pontos e traços do cpf
        $cpf_value = str_replace(array('.', '-', '/'), "", $cpf_value_sented); //retirando os espaços, pontos e traços do cpf

        $id = $this->model->inserir($nome, $cpf_value, $email);
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
    public function atualizar($id, $nome, $cpf, $email)
    {
        session_start();
        $cpf_value_sented = trim($cpf); //retirando os espaços, pontos e traços do cpf
        $cpf_value = str_replace(array('.', '-', '/'), "", $cpf_value_sented); //retirando os espaços, pontos e traços do cpf
        $editar = $this->model->atualizar($id, $nome, $cpf_value, $email);
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
