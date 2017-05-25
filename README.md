
Positional notation converter for PHP.

[![Build Status](https://travis-ci.org/perryflynn/base.svg?branch=master)](https://travis-ci.org/perryflynn/base)

## Example

```php
<?php
$enc = new \PerryBase\Base70();
for($i=0; $i<=999; $i++)
{
    echo $i."   -->   ".$enc->encode($i)."\n";
}
```

## Result

```
0           -->   0
1           -->   1
2           -->   2
[...]
10          -->   a
11          -->   b
12          -->   c
[...]
67          -->   ~
68          -->   $
69          -->   *
70          -->   10
71          -->   11
[...]
100         -->   1u
101         -->   1v
102         -->   1w
103         -->   1x
104         -->   1y
105         -->   1z
106         -->   1A
107         -->   1B
[...]
```
