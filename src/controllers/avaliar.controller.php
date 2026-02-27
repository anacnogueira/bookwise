<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: /");
    exit();
}

$usuario_id = auth()->id;
$livro_id = $_POST['livro_id'];
$avaliacao = $_POST['avaliacao'];
$nota = $_POST['nota'];

$location = "/livro?id=$livro_id";

$validacao = Validacao::validar([
    'avaliacao' => ['required'],
    'nota' => ['required'],     
], $_POST);

if ($validacao->naoPassou()) {
    flash()->push('validacoes', $validacao->validacoes);
    header("Location: $location");
    exit();
}

$DB->query(
    query: "insert into avaliacoes (usuario_id, livro_id, avaliacao, nota) 
    values (:usuario_id, :livro_id, :avaliacao, :nota)",
    params: compact('usuario_id','livro_id', 'avaliacao', 'nota'),
);

flash()->push('mensagem', 'Avaliação criada com sucesso');
header("location: $location");
exit();