<?php
$fichero = fopen("datos.txt", "r");
$anterior = 0;
$contador = 0; //guarda cuantas veces el numero es mayor que el anterior
while( !feof($fichero) ){
    $linea = intval(fgets($fichero));
    if ($linea > $anterior){
        $contador++;
    }
    $anterior = $linea; 
}

echo 'El numero es: '.$contador; 

fclose($fichero);

