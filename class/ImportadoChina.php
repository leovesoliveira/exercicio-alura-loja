<?php
class ImportadoChina extends Importado {

	private $codigoChines;

	public function getCodigoChines() {
        return $this->codigoChines;
    }

	public function setCodigoChines($codigoChines) {
        $this->codigoChines = $codigoChines;
    }

    public function atualizaBaseadoEm($params) {
        $this->setCpi($params["cpi"]);
        $this->setCodigoChines($params["codigoChines"]);
    }
}