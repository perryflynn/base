<?php

namespace PerryBase;

abstract class BaseBase
{

    /**
     * Returns the char list of this base
     */
    abstract public function getCharList();


    /**
     * Encode a base10 number to this base
     * @param int $number
     * @return string
     */
    public function encode($number)
    {
        $chars = $this->getCharList();
        $temp = (int)$number;
        $len = mb_strlen($chars);
        $buffer = "";

        do
        {
            $index = $temp % $len;
            $temp = ($temp-$index) / $len;
            $buffer = $chars[$index].$buffer;
        }
        while($temp/$len>0);

        return $buffer;
    }


    /**
     * Decode this base to a base10 number
     * @param string $string
     * @return int
     */
    public function decode($string)
    {
        $chars = $this->getCharList();
        $strlen = mb_strlen($string);
        $len = mb_strlen($chars);
        $buffer = 0;
        $temp = 1;

        for($i=$strlen-1; $i>=0; $i--)
        {
            $index = mb_strpos($chars, $string[$i]);
            $buffer += $index*$temp;
            $temp *= $len;
        }

        return $buffer;
    }

}
