<?php
function myTable($input)
{
    echo '<table>';
    for ($i = 1; $i <= $input; $i++) {
        // jika indeks lebih dari 8, buat row baru
        if ($i == 1 || $i % 8 == 1) {
            echo '<tr>';
        }
        // jika indeks kelipatan 3 atau 4, warna = putih
        if ($i % 3 == 0 || $i % 4 == 0) {
            echo '<td bgcolor="white"><font color="black">' . $i . '</td>';
            // else warna hitam
        } else {
            echo '<td bgcolor="black"><font color="white">' . $i . '</td>';
        }
        //jika indeks sudah mencapai 8, tutup row
        if ($i % 8 == 0) {
            echo '</tr>';
        }
    }
    echo '</table>';
}
echo myTable(64);
