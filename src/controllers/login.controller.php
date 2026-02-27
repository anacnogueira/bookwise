<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'senha' => ['required'],
    ], $_POST);

    if ($validacao->naoPassou()) {
        flash()->push('validacoes_login', $validacao->validacoes);
        header("Location: /login");
        exit();
    }

    $usuario = $DB->query(
        query: "select * from usuarios where email=:email AND senha=:senha",
        class: Usuario::class,
        params: compact('email', 'senha')    
    )->fetch();

    if ($usuario) {
        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem-vindo " . $usuario->nome . "!");
        header("Location: /");
        exit();
    } else {
        flash()->push('mensagem_login', 'Credenciais Inválidas!');
        header("Location: /login");
        exit();
    }
}    

view('login');