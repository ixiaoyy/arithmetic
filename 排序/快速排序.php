<?php

function quickSort($arr)
{
    if(count($arr) <= 1) return $arr;
    $middle = $arr[0];
    $leftArr = [];
    $rightArr = [];
    unset($arr[0]); // 每次要拿出来，不然那一直是
    foreach ($arr as $v) {
        if($v > $middle) $rightArr[] = $v;
        else $leftArr[] = $v;
    }

    $leftArr = quickSort($leftArr);
    $leftArr[] = $middle;

    $rightArr = quickSort($rightArr);
    return array_merge($leftArr,$rightArr);
}

$arr = [4,5,6,12,3,4,1];
$arr = quickSort($arr);
var_dump($arr);