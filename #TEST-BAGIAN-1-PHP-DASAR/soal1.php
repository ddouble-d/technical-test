<?php
$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";

//bikin array kosong
$hasil = [];
// pecah string ke array
$nilaiExploded = explode(' ', $nilai);
// convert string ke int, lalu masukkan ke array
foreach ($nilaiExploded as $n) {
    $hasil[] = (int) $n;
}

//1. Menghitung nilai rata-rata
$average = array_sum($hasil) / count($hasil);

//2. Mencari nilai tertinggi
$maxNum = max($hasil);

//3. Mencari nilai terendah
$minNum = min($hasil);

echo "Nilai rata-rata = " . $average . ". Nilai tertinggi = " . $maxNum . ". Nilai terendah = " . $minNum;
