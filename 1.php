<?php
function cek($dataKey, $word)
{
    for ($i = 0; $i < count($dataKey); $i++) {
        if ($word === $dataKey[$i]) {
            echo $dataKey[$i] . "=>" . "TRUE";
            echo "</br>";
        } else {
            echo $dataKey[$i] . "=>" . "FALSE";
            echo "</br>";
        }
    }
}
$dataKey = ['dumb', 'ways', 'the', 'best'];
$word = 'dumb';
cek($dataKey, $word);
