<?php
class Livro
{
    public $id;
    public $titulo;
    public $autor;
    public $descricao;
    public $ano_lancamento;
    public $usuario_id;
    public $count_avaliacoes;
    public $nota_avaliacao;
    public $imagem;

    private function query($where, $params)
    {
        $DB = new Database(config('database'));
        return $DB->query(
            query: "SELECT
                livro.id,
                livro.titulo,
                livro.autor,
                livro.descricao,
                livro.ano_lancamento,
                livro.imagem,
                count(avaliacao.id) as count_avaliacoes,
                round(sum(avaliacao.nota) /  count(avaliacao.id)) as nota_avaliacao
                FROM
                    livros livro
                LEFT JOIN avaliacoes avaliacao on avaliacao.livro_id = livro.id
                WHERE
                    $where
                GROUP BY
                    livro.id,
                    livro.titulo,
                    livro.autor,
                    livro.descricao,
                    livro.ano_lancamento;",
            class: self::class,
            params: $params
        );
    }

    public static function get($id)
    {       
        return (new self)->query('livro.id = :id', ['id' => $id])->fetch();
    }

    public static function all($filtro = '')
    {
        return (new self)->query('livro.titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();
    }

    public static function getByUserId($usuario_id)
    {
        return (new self)->query('livro.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();
    }
}
