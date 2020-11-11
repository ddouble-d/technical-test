<?php

function stringToGram($input)
{
    //pecah string ke array
    $inputExploded = explode(' ', $input);

    //declare string kosong
    $unigram = '';
    $bigram = '';
    $trigram = '';
    $i = 0;
    $j = 0;
    foreach ($inputExploded as $n) {
        // unigram
        $unigram .= $n . ', ';
        // bigram
        if ($i < 1) {
            $bigram .= $n . ' ';
            $i++;
        } else {
            $bigram .= $n . ', ';
            $i = 0;
        }
        // trigram
        if ($j < 2) {
            $trigram .= $n . ' ';
            $j++;
        } else {
            $trigram .= $n . ', ';
            $j = 0;
        }
    }
    //buang 2 string terakhir
    $unigram = substr($unigram, 0, -2);
    $bigram = substr($bigram, 0, -2);
    $trigram = substr($trigram, 0, -2);


    $result = 'Unigram : ' . $unigram . '<br>';
    $result .= 'Bigram : ' . $bigram . '<br>';
    $result .= 'Trigram : ' . $trigram;

    return $result;
}

echo stringToGram('Jakarta adalah ibukota negara Republik Indonesia');
