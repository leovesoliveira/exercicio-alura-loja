<?php
class Produto {
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;

    public function precoDesconto($valor = 0.1) {
    	if ($valor > 0 && $valor <= 0.5) {
        	return $this->preco -= $this->preco * $valor;
    	}

        return $this->preco;
    }
}
