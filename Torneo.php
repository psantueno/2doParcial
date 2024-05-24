<?php
class Torneo
{
    private $partidos; //colecccion de partidos.
    private $importePremio;

    public function __construct($importePremio)
    {
        $this->partidos = [];
        $this->importePremio = $importePremio;
    }

    public function getPartidos()
    {
        return $this->partidos;
    }


    public function getImportePremio()
    {
        return $this->importePremio;
    }


    public function setPartidos($partidos)
    {
        $this->partidos = $partidos;
    }


    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }


    // Método para ingresar un partido
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
    {

        if (
            $OBJEquipo1->getObjCategoria()->getDescripcion() === $OBJEquipo2->getObjCategoria()->getDescripcion() &&
            $OBJEquipo1->getCantJugadores() === $OBJEquipo2->getCantJugadores()
        ) {

            $colecPartidos = $this->getPartidos();

            if ($tipoPartido === 'futbol') {
                $idPartido = count($this->getPartidos()) + 1;
                $categPartido = $OBJEquipo1->getObjCategoria()->getDescripcion();
                $partido = new PartidoFutbol($idPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, $categPartido);
            } elseif ($tipoPartido === 'basquetbol') {
                $idPartido = count($this->getPartidos()) + 1;
                $partido = new PartidoBasquetbol($idPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, 0);
            }


            $colecPartidos[] = $partido;
            $this->setPartidos($colecPartidos);
        } else {
            $partido = null;
        }

        return $partido;
    }


    // Método para determinar los ganadores
    /*
    Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se
trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los
equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
objetos de los equipos encontrados.
    */


    // Método para determinar los ganadores
    public function darGanadores($deporte)
    {
        $ganadores = [];

        foreach ($this->getPartidos() as $partido) {
            if ($deporte == 'futbol' && $partido instanceof PartidoFutbol) {
                $ganadoresPartido = $partido->darEquipoGanador();
                foreach ($ganadoresPartido as $ganador) {
                    $ganadores[] = $ganador;
                }
            } elseif ($deporte == 'basquetbol' && $partido instanceof PartidoBasquetbol) {
                $ganadoresPartido = $partido->darEquipoGanador();
                foreach ($ganadoresPartido as $ganador) {
                    $ganadores[] = $ganador;
                }
            }
        }

        return $ganadores;
    }


    // Método para calcular el premio del partido

    /*
     Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave
es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado
para el torneo.
(premioPartido = Coef_partido * ImportePremio)
     */
    public function calcularPremioPartido($OBJPartido)
    {
        $premioPartido = [];

        // Obtener el equipo ganador del partido
        $equipoGanador = $OBJPartido->darEquipoGanador();

        // Calcular el premio del partido
        $coeficientePartido = $OBJPartido->coeficientePartido();
        $premioPartido['equipoGanador'] = $equipoGanador;
        $premioPartido['premioPartido'] = $coeficientePartido * $this->getImportePremio();

        return $premioPartido;
    }


    public function __toString()
    {
        $cadena = "Importe Premio: " . $this->getImportePremio() . "\n";
        $cadena .= "Partidos:\n";
        foreach ($this->getPartidos() as $partido) {
            $cadena .= $partido . "\n";
        }
        return $cadena;
    }
}
