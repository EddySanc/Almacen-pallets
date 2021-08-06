<?php
echo "Hola";

$var2 = "11/10/2020 08:40:00";
$date2 = str_replace('/', '.', $var2);
$date2= date('Y-m-d H:i:s', strtotime($date2));

echo "<br>Fecha 2: ".$date2;

?>