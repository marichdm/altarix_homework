<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 30.10.18
 * Time: 15:53
 */
function converToDecimal(string $number, int $fromBase) {
    $array = getReverseAnArray(str_split($number));
    $result = (int) 0;
    foreach ($array as $key => $value) {
        $value = getHexFromString($value);
        $result += (int)$value * ($fromBase**$key);
    }
    return $result;
}


function convertFromDecimal(int $number, int $toBase) {
    $array = array();
    while(2*$number >= $toBase) {
        $result = getHexFromInt($number % $toBase);
        (int) $number = (int)$number / (int) $toBase;
        array_unshift($array,$result);
    }
    array_unshift($array,getHexFromInt((int)$number));
    return implode("",$array);
}


function getReverseAnArray($array = array()) {
    $newArr = array();
    foreach ($array as $key => $value) {
        array_unshift($newArr, $value);
    }
    return $newArr;
}

function getHexFromString(string $number)
{
    switch ($number) {
        case 'a':
            $number = 0xA;
            break;
        case 'b':
            $number = 0xB;
            break;
        case 'c':
            $number = 0xC;
            break;
        case 'd':
            $number = 0xD;
            break;
        case 'e':
            $number = 0xE;
            break;
        case 'f':
            $number = 0xF;
            break;
    }
    return $number;
}


function getHexFromInt(int $number)
{
    switch ($number) {
        case 10:
            $number = 'a';
            break;
        case 11:
            $number = 'b';
            break;
        case 12:
            $number = 'c';
            break;
        case 13:
            $number = 'd';
            break;
        case 14:
            $number = 'e';
            break;
        case 15:
            $number = 'f';
    }
    return $number;
}
    function getTrueHex(string $number){
        switch ($number){
            case 'a': $number = 0xA;
                break;
            case 'b': $number = 0xB;
                break;
            case 'c': $number = 0xC;
                break;
            case 'd': $number = 0xD;
                break;
            case 'e': $number = 0xE;
                break;
            case 'f': $number = 0xF;
                break;
        }
        return $number;
}

function toConvert(string $convertibleNumber, int $fromBase, int $toBase) {
    return convertFromDecimal(converToDecimal( $convertibleNumber, $fromBase),$toBase);
}
echo toConvert((string)$_POST['convertibleNumber'],(int)$_POST['fromBase'] ,(int)$_POST['toBase']);
 
