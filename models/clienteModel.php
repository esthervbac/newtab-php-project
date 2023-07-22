<?php
class clienteModel
{
    private $PDO;
    public function __construct()
    {
        require_once("c://xampp/htdocs/newtab-projeto-php-individual/config/conexao.php");
        $conn = new db();
        $this->PDO = $conn->conexao();
    }
    public function inserir($nome, $cpf, $email)
    {
        session_start();

        $cpf_value_sented = trim($cpf); //retirando os espaços, pontos e traços do cpf
        $cpf_value = str_replace(array('.', '-', '/'), "", $cpf_value_sented); //retirando os espaços, pontos e traços do cpf

        $queryCpf = $this->PDO->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
        $queryCpf->bindValue(':cpf', $cpf_value);
        $queryCpf->execute();

        $queryEmail = $this->PDO->prepare("SELECT * FROM clientes WHERE email = :email");
        $queryEmail->bindValue(':email', $email);
        $queryEmail->execute();

        if ($queryCpf->rowCount() === 0) {

            if ($queryEmail->rowCount() === 0) {

                $query = $this->PDO->prepare("INSERT INTO clientes VALUES(null,:nome,:cpf,:email,null)");
                $query->bindParam(":nome", $nome);
                $query->bindParam(":cpf", $cpf);
                $query->bindParam(":email", $email);
                return ($query->execute()) ? $this->PDO->lastInsertId() : false;
            } else {
                $_SESSION['messageemail'] = "Erro: Email já cadastrado! Escolha outro email para o cadastro!";
                header("Location:cadastrar.php");
                exit(0);
            }
        } else {
            $_SESSION['messagecpf'] = "Erro: CPF já cadastrado!";
            header("Location:cadastrar.php");
            exit(0);
        }
    }
    public function mostrar($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM clientes WHERE id_cliente = :id LIMIT 1");
        $query->bindParam(":id", $id);
        return ($query->execute()) ? $query->fetch() : false;
    }
    public function listar()
    {
        if (!empty($_GET['search'])) {
            $data = $_GET['search'];
            $query = $this->PDO->prepare("SELECT * FROM clientes WHERE id_cliente LIKE '%$data%' or nome_do_cliente LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or data_cadastro LIKE '%$data%' ORDER BY id_cliente ASC");
        } else {
            $query = $this->PDO->prepare("SELECT * FROM clientes ORDER BY id_cliente ASC");
        }
        return ($query->execute()) ? $query->fetchAll() : false;
    }
    public function atualizar($id, $nome, $cpf, $email)
    {
        $query = $this->PDO->prepare("UPDATE clientes SET nome_do_cliente = :nome, cpf = :cpf, email = :email WHERE id_cliente = :id");
        $query->bindParam(":id", $id);
        $query->bindParam(":nome", $nome);
        $query->bindParam(":cpf", $cpf);
        $query->bindParam(":email", $email);
        return ($query->execute()) ? $id : false;
    }
    public function deletar($id)
    {
        $query = $this->PDO->prepare("DELETE FROM clientes WHERE id_cliente = :id");
        $query->bindParam(":id", $id);
        return ($query->execute()) ? true : false;
    }
}
