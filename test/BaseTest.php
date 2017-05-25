<?php

use PerryBase\Base2;
use PerryBase\Base16;
use PerryBase\Base70;

if (!class_exists('\PHPUnit\Framework\TestCase') &&
    class_exists('\PHPUnit_Framework_TestCase'))
{
    class_alias('\PHPUnit_Framework_TestCase', 'PHPUnit\Framework\TestCase');
}

class BaseTest extends \PHPUnit\Framework\TestCase
{

    public function testBase()
    {
        $encoders = array(
            new Base70(),
            new Base16(),
            new Base2()
        );

        $valuess = array(
            array(
                0 => "0",
                1 => "1",
                2 => "2",
                3 => "3",
                1815 => "p@",
                1816 => "p_",
                1817 => "p~",
                1818 => "p\$",
                1819 => "p*",
                1820 => "q0",
                1821 => "q1",
                5299 => "15N",
                5300 => "15O",
                5301 => "15P",
                5309 => "15X",
                5310 => "15Y",
                5311 => "15Z",
                5312 => "15.",
                5313 => "15,",
                5314 => "15-",
                5315 => "15@",
                5316 => "15_",
                5317 => "15~",
                5318 => "15\$",
                5319 => "15*",
                5320 => "160",
            ),
            array(
                0 => "0",
                10 => "a",
                15 => "f",
                16 => "10",
                3842 => "f02",
                3843 => "f03",
                3844 => "f04",
                3845 => "f05",
                3846 => "f06",
                3847 => "f07",
                3848 => "f08",
                3849 => "f09",
                3850 => "f0a"
            ),
            array(
                0 => "0",
                1 => "1",
                2 => "10",
                9958 => "10011011100110",
                9959 => "10011011100111",
                9960 => "10011011101000",
                9961 => "10011011101001",
                9962 => "10011011101010",
                9963 => "10011011101011",
                9964 => "10011011101100",
                9965 => "10011011101101",
                9966 => "10011011101110",
                9967 => "10011011101111",
                9968 => "10011011110000"
            ),
        );

        for($j=0; $j<count($encoders); $j++)
        {
            $enc = $encoders[$j];
            $values = $valuess[$j];

            foreach($values as $key => $result)
            {
                $res = $enc->encode($key);
                $res2 = $enc->decode($result);
                $this->assertSame($result, $res);
                $this->assertSame($key, $res2);
            }

            for($i=0; $i<9999; $i++)
            {
                $res = $enc->encode($i);
                $res2 = $enc->decode($res);
                $this->assertSame($i, $res2);
                echo $i."   =>   ".$res."\n";
            }

            for($i=1000000; $i<1000999; $i++)
            {
                $res = $enc->encode($i);
                $res2 = $enc->decode($res);
                $this->assertSame($i, $res2);
            }
        }
    }

}
