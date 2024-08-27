<?php

namespace Pansiere\Alura\Repositorio;

use PDO;
use Pansiere\Alura\Modelos\Produto;

class ProdutoRepositorio
{
    /**
     * @param PDO $pdo
     */
    public function __construct(
        private PDO $pdo
    ) {}

    private function formarObjeto($dados): Produto
    {
        return new Produto(
            $dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem'],
        );
    }

    public function opcoesCafe(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return $this->formarObjeto($cafe);
        }, $produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(
            function ($almoco) {
                return $this->formarObjeto($almoco);
            },
            $produtosAlmoco
        );

        return $dadosAlmoco;
    }

    public function buscarTodos(): array
    {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto) {
            return $this->formarObjeto($produto);
        }, $dados);

        return $todosOsDados;
    }

    public function deletar(int $id): void
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->binDvalue(1, $id);
        $statement->execute();
    }

    public function salvar(Produto $produto): void
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statment = $this->pdo->prepare($sql);
        $statment->binDvalue(1, $produto->getTipo());
        $statment->binDvalue(2, $produto->getNome());
        $statment->binDvalue(3, $produto->getDescricao());
        $statment->binDvalue(4, $produto->getPreco());
        $statment->binDvalue(5, $produto->getImagem());
        $statment->execute();
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function editar(int $id, string $tipo, string $nome, string $descricao, $preco): void
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tipo);
        $statement->bindValue(2, $nome);
        $statement->bindValue(3, $descricao);
        $statement->bindValue(4, $preco);
        $statement->bindValue(5, $id);
        $statement->execute();
    }

    public function editarComImagem(int $id, string $tipo, string $nome, string $descricao, $preco, $nomeDaImagem): void
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tipo);
        $statement->bindValue(2, $nome);
        $statement->bindValue(3, $descricao);
        $statement->bindValue(4, $preco);
        $statement->bindValue(5, $nomeDaImagem);
        $statement->bindValue(6, $id);
        $statement->execute();
    }
}
