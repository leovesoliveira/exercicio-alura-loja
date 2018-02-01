<?php
class ImportadoRussia extends Importado {

	private $codigoRusso;

	public function getCodigoRusso() {
        return $this->codigoRusso;
    }

	public function setCodigoRusso($codigoRusso) {
        $this->codigoRusso = $codigoRusso;
    }

    public function atualizaBaseadoEm($params) {
        $this->setCpi($params["cpi"]);
        $this->setCodigoRusso($params["codigoRusso"]);
    }
}