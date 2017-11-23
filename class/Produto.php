<?php
class Produto {
    public $id;
    public $nome;
    public $descricao;
    public $categoria;
    public $usado;

    public function precoDesconto($valor = 0.1) {
        return $this->preco -= $this->preco * $valor;
    }
}
