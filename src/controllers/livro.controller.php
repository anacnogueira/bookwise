<?php

$id = $_REQUEST['id'];

$livro = $DB->query(
    query: "select * from livros WHERE usuario_id = 1 AND  id = :id",
    class: Livro::class,
    params: ['id' => $id]  
)->fetch();

view('livro', compact('livro'));
