<?php
$tarif = "";
function hitungParkir($jam)
{
    if ($jam <= 3) {
        echo $tarif = ($jam * 2000);
    } elseif ($jam > 3 and $jam <= 7) {
        $jam = $jam - 3;
        echo $tarif = (6000 + (1000 * $jam));
    } else {
        echo $tarif = 10000;
    }
}

hitungParkir(9);
