<?php
$fichero = fopen("datos3.txt", "r");
$gamma = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
$contador = 0;
while( !feof($fichero) ){
    $linea = fgets($fichero);
    for ($i=0; $i<12; $i++){
        $gamma[$i] += substr($linea, $i, 1);
    }

    $contador++;
}
echo $contador .'<br>';
print_r($gamma).'<br>';
//echo 'La X es: '.$x.' y la Y es: '.$y.' , multiplicados da '.($x*$y); 
$ep = "";
$gm = "";
for ($i=0; $i<12; $i++){
   if ($gamma[$i] > 500) {
       $gm = $gm.'1';$ep = $ep.'0';
   }
   else {
    $gm = $gm.'0';$ep = $ep.'1';
   }
}
$gm_num = bindec($gm);
$ep_num = bindec($ep);

echo '<br><br>gamma es: '.$gm.' y epsilon es: '.$ep.'  '; 
echo '<br><br>gamma es: '.$gm_num.' y epsilon es: '.$ep_num.'  '; 
echo '<br><br>la solución es: '.($gm_num*$ep_num).''; 

fclose($fichero);

