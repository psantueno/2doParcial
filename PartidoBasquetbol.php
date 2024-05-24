<?php
class PartidoBasquetbol extends Partido {
    private $cantInfracciones;
    private $coefPenalizacion = 0.75;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
    }


    public function getCantInfracciones() {
        return $this->cantInfracciones;
    }

    public function setCantInfracciones($cantInfracciones) {
        $this->cantInfracciones = $cantInfracciones;
    }

    // Getters y Setters para coefPenalizacion
    public function getCoefPenalizacion() {
        return $this->coefPenalizacion;
    }

    public function setCoefPenalizacion($coefPenalizacion) {
        $this->coefPenalizacion = $coefPenalizacion;
    }


    // Método para calcular el coeficiente del partido de básquetbol
    public function coeficientePartido() {
       
        $calculoCoef =  parent::coeficientePartido() - ($this->getCoefPenalizacion() * $this->getCantInfracciones());
        return $calculoCoef;
    }
}
?>