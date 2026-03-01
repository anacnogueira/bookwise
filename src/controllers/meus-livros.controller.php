<?php
if (!auth()) {
    header("location: /");
    exit();
}
$usuario_id = auth()->id;
$livros = $DB->query(
    query: "SELECT * FROM livros where usuario_id = :usuario_id",    
    class: Livro::class,
    params: ['usuario_id' => $usuario_id]
)->fetchAll();

view('meus-livros', compact("livros"));