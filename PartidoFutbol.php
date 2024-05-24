<?php
class PartidoFutbol extends Partido {

    private $coefMenores = 0.13;
    private $coefJuveniles = 0.19;
    private $coefMayores = 0.27;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
    }

        // Getter y Setter para coeficiente de la categoría "Menores"
        public function getCoefMenores() {
            return $this->coefMenores;
        }
    
        public function setCoefMenores($coefMenores) {
            $this->coefMenores = $coefMenores;
        }
    
        // Getter y Setter para coeficiente de la categoría "Juveniles"
        public function getCoefJuveniles() {
            return $this->coefJuveniles;
        }
    
        public function setCoefJuveniles($coefJuveniles) {
            $this->coefJuveniles = $coefJuveniles;
        }
    
        // Getter y Setter para coeficiente de la categoría "Mayores"
        public function getCoefMayores() {
            return $this->coefMayores;
        }
    
        public function setCoefMayores($coefMayores) {
            $this->coefMayores = $coefMayores;
        }


    //Método para calcular el coeficiente del partido de fútbol
    public function coeficientePartido() {
        $calculoCoef = 0;
        
        if (parent::getObjEquipo1()->getObjCategoria()->getDescripcion() === "Menores") {
            $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
            $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
            $calculoCoef = $this->getCoefMenores() * $cantGoles * $cantJugadores;
        } elseif (parent::getObjEquipo1()->getObjCategoria()->getDescripcion() === "Mayores") {
            $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
            $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
            $calculoCoef = $this->getCoefMayores() * $cantGoles * $cantJugadores;
        } elseif (parent::getObjEquipo1()->getObjCategoria()->getDescripcion() === "Juveniles") {
            $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
            $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
            $calculoCoef = $this->getCoefJuveniles() * $cantGoles * $cantJugadores;
        }

        return $calculoCoef;

    }

   

    // public function calcularCoeficiente() {
    //     $coef = 0;
    //     switch ($this->categoria) {
    //         case "menores":
    //             $coef = $this->coefMenores * $this->getCantGolesE1() * $this->getObjEquipo1()->getCantJugadores() + 
    //                     $this->coefMenores * $this->getCantGolesE2() * $this->getObjEquipo2()->getCantJugadores();
    //             break;
    //         case "juveniles":
    //             $coef = $this->coefJuveniles * $this->getCantGolesE1() * $this->getObjEquipo1()->getCantJugadores() + 
    //                     $this->coefJuveniles * $this->getCantGolesE2() * $this->getObjEquipo2()->getCantJugadores();
    //             break;
    //         case "mayores":
    //             $coef = $this->coefMayores * $this->getCantGolesE1() * $this->getObjEquipo1()->getCantJugadores() + 
    //                     $this->coefMayores * $this->getCantGolesE2() * $this->getObjEquipo2()->getCantJugadores();
    //             break;
    //     }
    //     return $coef;
    // }
}
?>
