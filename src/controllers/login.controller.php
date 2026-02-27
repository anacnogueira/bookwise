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
        query: "select * from usuarios where email=:email",
        class: Usuario::class,
        params: compact('email')    
    )->fetch();

    if ($usuario) {        
        if (!password_verify($senha, $usuario->senha)) {
            flash()->push('validacoes_login', ['Credenciais inválidas!']);
            header("Location: /login");
            exit();
        }
        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem-vindo " . $usuario->nome . "!");
        header("Location: /");
        exit();
    } else {
        flash()->push('validacoes_login', ['Credenciais Inválidas!']);
        header("Location: /login");
        exit();
    }
}



view('login');