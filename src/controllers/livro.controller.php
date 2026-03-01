<?php

$id = $_REQUEST['id'];

$livro = $DB->query(
    query: " SELECT
        livro.id,
        livro.titulo,
        livro.autor,
        livro.descricao,
        livro.ano_lancamento,
        count(avaliacao.id) as count_avaliacoes,
        round(sum(avaliacao.nota) /  count(avaliacao.id)) as nota_avaliacao
    FROM
        livros livro
    LEFT JOIN avaliacoes avaliacao on avaliacao.livro_id = livro.id
    WHERE
        livro.id = :id
    GROUP BY
        livro.id,
        livro.titulo,
        livro.autor,
        livro.descricao,
        livro.ano_lancamento;",
    class: Livro::class,
    params: ['id' => $id]  
)->fetch();

$avaliacoes = $DB->query(
    query: "select * from avaliacoes WHERE livro_id = :livro_id",
    class: Avaliacao::class,
    params: ['livro_id' => $id]  
)->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
