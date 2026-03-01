<?php
if (!auth()) {
    header("location: /");
    exit();
}
$usuario_id = auth()->id;

$livros = Livro::getByUserId($usuario_id);

view('meus-livros', compact("livros"));