<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 16/11/2017
 * Time: 10:56
 */

require_once "Conexao.php";
require_once "Produto.php";

class CrudProdutos {

    private $conexao;
    private $produto;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto){
        $sql = "INSERT INTO tb_produtos (nome, preco, categoria, estoque) VALUES ('$produto->nome', $produto->preco, '$produto->categoria', $produto->estoque)";

        $this->conexao->exec($sql);
    }

    public function getProduto(int $x){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos WHERE id = $x");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['id']);

    }

    public function getProdutos(){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        //Fabrica de Produtos
        $listaProdutos = [];
        foreach ($arrayProdutos as $produto){
            $listaProdutos[] = new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['id']);
        }

        return $listaProdutos;

    }

    public function excluir(int $id){
        $this->conexao->exec("DELETE FROM tb_produtos WHERE id = $id");
    }

    public function editar(Produto $produto){

        $this->conexao->exec("UPDATE tb_produtos SET nome ='$produto->nome', preco = $produto->preco, categoria = '$produto->categoria', estoque = $produto->estoque WHERE id = $produto->id ");

    }

    public function comprar(int $id, int $qntdDesejada){

        $p = $this->conexao->query("SELECT estoque FROM tb_produtos WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

        if ($qntdDesejada > $p['estoque']){
            return "A quantidade desejada é maior que a disponivel";
        }

        $novaQuantidade = $p['estoque'] - $qntdDesejada;

        $this->conexao->exec("UPDATE `tb_produtos` SET `estoque`= $novaQuantidade WHERE id = $id");

        return "Compra realizada com sucesso";


    }


}