<?php

$id = $_REQUEST['id'];

$livro = $DB->query(
    query: "select * from livros WHERE id = :id",
    class: Livro::class,
    params: ['id' => $id]  
)->fetch();

$avaliacoes = $DB->query(
    query: "select * from avaliacoes WHERE livro_id = :livro_id",
    class: Avaliacao::class,
    params: ['livro_id' => $id]  
)->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
