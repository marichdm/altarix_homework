<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 27.10.18
 * Time: 18:05
 */

function itWontPass(int $currentTemperature, int $yesterdayTemperature, int $tomorrowsTemperature, bool $isRainfall, string $whatTheNeighborSaid){
    if(isDanger($whatTheNeighborSaid,$currentTemperature,$yesterdayTemperature,$tomorrowsTemperature)){
        return speakGandalfsVoice();
    }
    else {
        return choiceOfClothes($currentTemperature,$yesterdayTemperature,$tomorrowsTemperature,$whatTheNeighborSaid).getRainfallData($isRainfall,$currentTemperature,$tomorrowsTemperature);
    }
}
function isDanger(string $whatTheNeighborSaid, int $currentTemperature, int $yesterdayTemperature, int $tomorrowsTemperature) {
    if((getNeighbodPhrase($whatTheNeighborSaid) > 1) && coldWeatherForecast($currentTemperature,$yesterdayTemperature,$tomorrowsTemperature) && (getTemperatureDifferenceBetweenTodayAndTomorrow($currentTemperature,$tomorrowsTemperature) > 5)){
        return true;
    }
    else
        return false;
}

function getNeighbodPhrase(string $phrase){
    $subphrases = explode(" ",$phrase);
    $count = (int)0;
    foreach ($subphrases as $value){
        if ((strcmp($value, "холодно") == 0) || (strcmp($value, "заморозки") == 0) || (strcmp($value, "замерзла") == 0)) {
            $count++;
        }
    }
    return $count;
}

function choiceOfClothes(int $currentTemperature, int $yesterdayTemperature, int $tomorrowsTemperature, string $whatTheNeighborSaid){
    $str = "";
    if($currentTemperature < 13 && $yesterdayTemperature >= 11 && $tomorrowsTemperature >= 11){
        $str = "Одень шапку!";
    }
    elseif ($currentTemperature < 13 && $yesterdayTemperature < 11 & $tomorrowsTemperature < 11){
        $str =  "Одень зимнюю шапку!";
    }
    if (coldWeatherForecast($currentTemperature,$yesterdayTemperature,$tomorrowsTemperature) || getNeighbodPhrase($whatTheNeighborSaid) === 1) {
        $str = $str."Ты хорошо оделся?";
    }
    return $str;
}
function coldWeatherForecast(int $currentTemperature, int $yesterdayTemperature, int $tomorrowsTemperature){
    if(($yesterdayTemperature > $currentTemperature) && ($currentTemperature > $tomorrowsTemperature)){
        return true;
    }
    else return false;
}

function getTemperatureDifferenceBetweenTodayAndTomorrow(int $currentTemperature,int $tomorrowsTemperature){
    return $currentTemperature - $tomorrowsTemperature;
}



function getRainfallData(bool $isRainfall, int $currentTemperature, int $tomorrowsTemperature){
    $str = "";
    if($isRainfall){
        $str = " Возьми с собой зонтик!";
        if(getTemperatureDifferenceBetweenTodayAndTomorrow($currentTemperature,$tomorrowsTemperature) > 3 ){
            $str = $str . " И шарф!";
        }
    }
    return $str;
}

function speakGandalfsVoice(){
    $resultStr = "ТЫ НЕ ПРОЙДЕШЬ!!!";
    return $resultStr;
}


echo itWontPass((int)$_POST['currentTemperature'],(int)$_POST['yesterdayTemperature'],(int)$_POST['tomorrowTemperature'],(bool)$_POST['isRainfall'],(string)$_POST['whatTheNeighborSaid']);
 
