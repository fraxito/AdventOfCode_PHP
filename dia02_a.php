<?php
$fichero = fopen("datos2.txt", "r");
$x = 0;
$y = 0; 
while( !feof($fichero) ){
    $linea = explode(" ",fgets($fichero));
    if ($linea[0] == 'forward'){
        $x += intval($linea[1]);
    }
    if ($linea[0] == 'up'){
        $y -= intval($linea[1]);
    }
    if ($linea[0] == 'down'){
        $y += intval($linea[1]);
    }

}

echo 'La X es: '.$x.' y la Y es: '.$y.' , multiplicados da '.($x*$y); 

fclose($fichero);

