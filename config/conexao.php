<?php
class db
{
    private $host = "localhost:3305";
    private $dbname = "phpprojeto";
    private $user = "root";
    private $password = "";
    public function conexao()
    {
        try {
            $PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
