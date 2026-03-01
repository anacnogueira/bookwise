<?php

$id = $_REQUEST['id'];

$livro = Livro::get($id);

$avaliacoes = $DB->query(
    query: "select * from avaliacoes WHERE livro_id = :livro_id",
    class: Avaliacao::class,
    params: ['livro_id' => $id]  
)->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
