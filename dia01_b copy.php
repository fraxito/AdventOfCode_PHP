<?php
$fichero = fopen("datos.txt", "r");

$contador = 0; //guarda la posición que estoy leyendo
$numeros = array(); //va a guardar los datos del fichero
$resultado = 0;
while( !feof($fichero) ){
    $numeros[$contador] = intval(fgets($fichero));
    if ($contador > 2){
        $totalA = $numeros[$contador - 3] + 
                $numeros[$contador - 2] +
                $numeros[$contador - 1];
        $totalB = $numeros[$contador - 2] + 
                $numeros[$contador - 1] +
                $numeros[$contador];
        if( $totalA < $totalB){
            $resultado++;
        }   
    }                       
    $contador++;
}

echo 'El numero es: '.$resultado; 

fclose($fichero);

