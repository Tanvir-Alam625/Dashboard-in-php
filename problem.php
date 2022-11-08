<?php
$num = -0000022;
$revnum = 0;
while ($num)
{
$newD = $num % 10;
$revnum = $revnum * 10 + $newD;
$num = (int)($num / 10);
}
echo $revnum;
?>
