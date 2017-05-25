<?php

require_once 'test/bootstrap.php';

function pad($str)
{
    return str_pad($str, 9, " ", STR_PAD_RIGHT);
}

$enc = new \PerryBase\Base70();

for($i=100; $i<=200; $i++)
{
    echo pad($i)."   -->   ".$enc->encode($i)."\n";
}
