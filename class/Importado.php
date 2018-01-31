<?php
abstract class Importado extends Produto {
    private $cpi;

    public function getCpi() { return $this->cpi; }
    public function setCpi($cpi) { $this->cpi = $cpi; }

    public function calculaImposto() { return $this->getPreco() * 0.7; }
}
