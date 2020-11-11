<?php
$arr = array(
    "f", "g", "h", "i",
    "j", "k", "p", "q",
    "r", "s", "t", "u",
);

function cari($arr, $input)
{
    //declare array kosong
    $data = [];
    foreach (str_split($input) as $n) {
        //jika input ada pada array, isi $data dengan true
        if (in_array($n, $arr)) {
            array_push($data, true);
            // else isi $data dengan false
        } else {
            array_push($data, false);
        }
    }
    // cek $data terdapat false, kalau ada return false
    foreach ($data as $d) {
        if ($d == false) {
            return "FALSE";
        }
    }
    return "TRUE";
}

echo cari($arr, "fghi");
echo cari($arr, "fghp");
echo cari($arr, "fjrstp");
