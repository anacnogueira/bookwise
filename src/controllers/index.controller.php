<?php

$pesquisar = $_REQUEST['pesquisar'] ?? '';

$livros = Livro::all($pesquisar);

view('index',compact('livros'));
