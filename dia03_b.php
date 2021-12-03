<?php
$fichero = fopen("datos3.txt", "r");
$longi = 12;
$contador = 0;
$datos = array();
$datosN = array();
while( !feof($fichero) ){
    $linea = fgets($fichero);
    $datos[$contador] = $linea;
    $datosN[$contador] = $linea;
    $contador++;
}
fclose($fichero);
$longitud = 0;
while ($longitud < $longi  && count($datosN) != 1){
    $signo = calculaBit($longitud, $datos); //($gamma[0]>500)?1:0;
    echo 'El bit es '.$signo.' ';
    $datos2 = array();
    for ($i=0; $i < count($datos); $i++){
        if ( $signo == substr($datos[$i], $longitud, 1)){
            array_push($datos2, $datos[$i]);
        }
    }
    $longitud++;
    echo 'Total: '.(count($datos)).'<br>';
    $datos  = array_merge(array(), $datos2); 
    $resultado1 = $datos[0];
}

echo 'VALOR FINAL: '.$resultado1.'<br>';


$longitud = 0;
while ($longitud < $longi && count($datosN) != 1){
    $signo = calculaBit2($longitud, $datosN); 
    echo 'El bit es '.$signo.' ';
    $datos2 = array();
    for ($i=0; $i < count($datosN); $i++){
        if ( $signo != substr($datosN[$i], $longitud, 1)){
            array_push($datos2, $datosN[$i]);
        }
    }
    $longitud++;
    
    $datosN  = array_merge(array(), $datos2); 
    echo 'Total: '.(count($datosN)).'';
    if (count($datosN) < 10 ){print_r($datosN);echo ' '. $longitud.' <br>';}
    $resultado2 = $datos2[0];
}

echo 'VALOR FINAL: '.$resultado2;

echo bindec($resultado1) * bindec($resultado2);


function calculaBit($posicion, $datos_){
    $unos = 0;
    for ($i=0; $i < count($datos_); $i++){
        $unos += intval(substr($datos_[$i], $posicion, 1));
    }
    if ($unos >= count($datos_)/2 ){
        return 1;
    }else{
        return 0;
    }
}
function calculaBit2($posicion, $datos_){
    $unos = 0;
    for ($i=0; $i < count($datos_); $i++){
        $unos += intval(substr($datos_[$i], $posicion, 1));
    }
    if ($unos < count($datos_)/2 ){
        return 0;
    }else{
        return 1;
    }
}