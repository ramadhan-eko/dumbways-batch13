<?php
function hitung($total_belanja, $jumlah_uang)
{
    $uang_kembali = "";
    $satuan1 = $satuan2 = $satuan3 = $satuan4 = "";
    $uang_kembali = $jumlah_uang - $total_belanja;
    for ($i = 0; $i < 4; $i++) {
        if ($uang_kembali >= 50000) {
            $satuan1  = floor($uang_kembali / 50000);
            $uang_kembali = $uang_kembali % 50000;
        } elseif ($uang_kembali >= 20000) {
            $satuan2 = floor($uang_kembali / 20000);
            $uang_kembali = $uang_kembali % 20000;
        } elseif ($uang_kembali >= 10000) {
            $satuan3 = floor($uang_kembali / 10000);
            $uang_kembali = $uang_kembali % 10000;
        } else {
            $satuan4 = floor($uang_kembali / 5000);
            $uang_kembali = $uang_kembali % 5000;
        }
    }
    $lembar = [
        '50000' => $satuan1,
        '20000' => $satuan2,
        '10000' => $satuan3,
        '5000' => $satuan4
    ];
    echo "50000 = " . $lembar['50000'] . "</br>";
    echo "20000 = " . $lembar['20000'] . "</br>";
    echo "10000 = " . $lembar['10000'] . "</br>";
    echo "5000 = " . $lembar['5000'] . "</br>";
    echo "Disumbangkan = " . $uang_kembali;
}
$total_belanja = 110500;
$jumlah_uang = 200000;
hitung($total_belanja, $jumlah_uang);
