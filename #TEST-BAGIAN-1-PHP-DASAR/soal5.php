<?php
function enkripsi($input)
{
    // pecahkan per karakter string ke array
    $array = str_split($input);
    //declare variable kosong
    $result = '';
    for ($i = 0; $i < count($array); $i++) {
        //jika indeks 0, enkripsi karakter +1
        if ($i == 0) {
            $result .= chr(ord($array[$i]) + 1);
            // jika indeks genap, enkripsi karakter +2 dan kelipatannya
        } else if ($i % 2 == 0) {
            $result .= chr(ord($array[$i]) + ($i + 1));
            // jika indeks ganjil, enkripsi karakter minus indeks
        } else {
            $result .= chr(ord($array[$i]) - ($i + 1));
        }
    }
    return $result;
}

echo enkripsi("DFHKNQ");
