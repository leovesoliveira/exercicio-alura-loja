<?php
class Importado extends Produto {
    private $cpi;

    public function getCpi() {
        return $this->cpi;
    }

    public function setCpi($cpi) {
        $this->cpi = $cpi;
    }
}
