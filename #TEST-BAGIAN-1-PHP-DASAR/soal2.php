<?php

function lwrCase($input)
{
    //hitung lowercase dengan regex
    return strlen(preg_replace('![^a-z]+!', '', $input));
}

echo lwrCase("TranSISI");
