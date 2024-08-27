<?php

namespace Pansiere\MarFit\Repositories;

use PDO;
use Pansiere\MarFit\Models\Product;

class ProductRepository
{
    /**
     * @param PDO $pdo
     */
    public function __construct(
        private PDO $pdo
    ) {}

    private function formarObjeto(array $dados): Product
    {
        return new Product(
            $dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            (float) $dados['preco'],
            $dados['imagem'] ?? null
        );
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
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function salvar(Product $produto): void
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getPreco());
        $statement->bindValue(5, $produto->getImagem());
        $statement->execute();
    }

    public function buscar(int $id): ?Product
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $dados ? $this->formarObjeto($dados) : null;
    }

    public function editar(int $id, string $tipo, string $nome, string $descricao, float $preco): void
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tipo);
        $statement->bindValue(2, $nome);
        $statement->bindValue(3, $descricao);
        $statement->bindValue(4, $preco);
        $statement->bindValue(5, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function editarComImagem(int $id, string $tipo, string $nome, string $descricao, float $preco, string $nomeDaImagem): void
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tipo);
        $statement->bindValue(2, $nome);
        $statement->bindValue(3, $descricao);
        $statement->bindValue(4, $preco);
        $statement->bindValue(5, $nomeDaImagem);
        $statement->bindValue(6, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function opcoesCafe(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'formarObjeto'], $produtosCafe);
    }

    public function opcoesAlmoco(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'formarObjeto'], $produtosAlmoco);
    }
}
