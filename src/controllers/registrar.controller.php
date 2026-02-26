<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validacoes = [];

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $email_confirmacao = $_POST['email_confirmacao'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([
        'nome' => ['required'],
        'email' => ['required', 'email', 'confirmed'],
        'senha' => ['required', 'min:8', 'max:30', 'strong'],
    ], $_POST);

    if ($validacao->naoPassou()) {
        $_SESSION['validacoes'] = $validacao->validacoes;
        header("Location: /login");
        exit();
    }
    
    $resultado = $DB->query(
        query: "insert into usuarios (nome, email, senha) values (:nome, :email, :senha)",
        params: [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ]
    );

    header('location: /login?mensagem=Registrado com sucesso!');

    exit();
};
