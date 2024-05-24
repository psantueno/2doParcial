<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquetbol.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

/*
Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000.
*/
$importePremio = 100000;
$torneo = new Torneo($importePremio);

// Punto 2
$objPartido1 = new PartidoBasquetbol(11, "2024-05-05", $objE7, 80, $objE8, 120, 7);
$objPartido2 = new PartidoBasquetbol(12, "2024-05-06", $objE9, 81, $objE10, 110, 8);
$objPartido3 = new PartidoBasquetbol(13, "2024-05-07", $objE11, 115, $objE12, 85, 9);


// Punto 3 

$objPartido4 = new PartidoFutbol(14, "2024-05-07", $objE1, 3, $objE2, 2);
$objPartido5 = new PartidoFutbol(15, "2024-05-08", $objE3, 0, $objE4, 1);
$objPartido6 = new PartidoFutbol(16, "2024-05-09", $objE5, 2, $objE6, 3);

// Punto 3.a
$resultadoA = $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
echo "Resultado de ingresarPartido(a): " . $resultadoA . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n";

// Punto 3.b
$resultadoB = $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
echo "Resultado de ingresarPartido(b): " . $resultadoB . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n";

// Punto 3.c
$resultadoC = $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
echo "Resultado de ingresarPartido(c): " . $resultadoC . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n";

// Punto 3.d
echo "Ganadores de partidos de básquet: ";
$ganadoresBasquet = $torneo->darGanadores('basquet');
foreach ($ganadoresBasquet as $equipo) {
    echo $equipo->getNombre() . ", ";
}
echo "\n";

// Punto 3.e
echo "Ganadores de partidos de fútbol: ";
$ganadoresFutbol = $torneo->darGanadores('futbol');
foreach ($ganadoresFutbol as $equipo) {
    echo $equipo->getNombre() . ", ";
}
echo "\n";

// Punto 3.f
// Calcular el premio del partido obtenido en a
$premioPartido4 = $torneo->calcularPremioPartido($objPartido4);
echo "Premio del partido obtenido en a: " . $premioPartido4['premioPartido'] . "\n";

// Calcular el premio del partido obtenido en b
$premioPartido5 = $torneo->calcularPremioPartido($objPartido5);
echo "Premio del partido obtenido en b: " . $premioPartido5['premioPartido'] . "\n";

// Calcular el premio del partido obtenido en c
$premioPartido6 = $torneo->calcularPremioPartido($objPartido6);
echo "Premio del partido obtenido en c: " . $premioPartido6['premioPartido'] . "\n";

// Punto 4
echo "Torneo completo:\n";
echo $torneo;
?>
