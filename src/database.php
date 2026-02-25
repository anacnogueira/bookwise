<?php

class DB
{
    private $db;

    public function __construct()
    {

        $this->db = new PDO('sqlite:database.sqlite');
    }

    public function livros($pesquisa = null)
    {
        /*$sql = "SELECT * FROM livros";
        if ($pesquisa) {
            $sql .= " WHERE titulo LIKE '%{$pesquisa}%' OR autor LIKE '%{$pesquisa}%' OR descricao LIKE '%{$pesquisa}%'";
        }*/

        $prepare = $this->db->prepare("SELECT * FROM livros WHERE usuario_id = 1 AND titulo LIKE :pesquisa");
        $prepare->bindValue("pesquisa", "%$pesquisa%");        
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function livro($id)
    {
        $prepare = $this->db->prepare("select * from livros WHERE usuario_id = 1 AND  id = :id");
        $prepare->bindParam("id", $id);
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();

        return $prepare->fetch();
    }
}
