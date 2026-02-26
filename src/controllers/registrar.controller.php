<?php
require "Validacao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validacoes = [];

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $email_confirmacao = $_POST['email_confirmacao'];
    $senha = $_POST['senha'];

    Validacao::validar([
        'nome' => ['required'],
        'email' => ['required', 'email', 'confirmed'],
        'senha' => ['required', 'min:8', 'max:30', 'strong'],
    ], $_POST);

    /*if (!$nome) {
        $validacoes[] = "O nome é obrigatório";
    }

    if (!$email) {
         $validacoes[] = "O e-mail é obrigatório";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $validacoes[] = "O e-mail é inválido";
    }

    if ($email_confirmacao != $email) {
         $validacoes[] = "O e-mail de confirmação não confere";
    }

    if (!$senha) {
         $validacoes[] = "A senha é obrigatória";
    }

    if (strlen($senha) < 8 || strlen($senha) > 30) {
         $validacoes[] = "A senha deve ter entre 8 e 30 caracteres";
    }

    if (!str_contains($senha, '*')) {
         $validacoes[] = "A senha precisa conter *";
    }

    if (sizeof($validacoes) > 0) {
        $_SESSION['validacoes'] = $validacoes;
        header("Location: /login");
        exit();
    }*/

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
