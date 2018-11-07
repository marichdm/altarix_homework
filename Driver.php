<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 02.11.18
 * Time: 19:19
 */

class Driver
{

    function __call($name, $params)
    {
        echo "Received command '$name' with paramert " . array_pop($params) . "\n";
    }
}
$driver = new Driver();

function actionsInTheFirstStepForCylinderOne ()
{
    global $driver;
    $driver->statusOfOutletValveOne('open; ');
    $driver->movePistonOne('up; ');

}
function actionsInTheSecondStepForCylinderOne ()
{
    global $driver;
    $driver->statusOfOutletValveOne('close; ');
    $driver->statusOfInletValveOne('open; ');
    $driver->movePistonOne('down; ');
}
function actionsInTheThirdStepForCylinderOne ()
{
    global $driver;
    $driver->statusOfInletValveOne('close; ');
    $driver->movePistonOne('up; ');
    $driver->lightInLampOne('light; ');
}
function actionsInTheFourthStepForCylinderOne ()
{
    global $driver;
    $driver->movePistonOne('down; ');
}

function actionsInTheFirstStepForCylinderTwo ()
{
    global $driver;
    $driver->movePistonTwo('down; ');
}
function actionsInTheSecondStepForCylinderTwo ()
{
    global $driver;
    $driver->statusOfOutletValveTwo('open; ');
    $driver->movePistonTwo('up; ');
}
function actionsInTheThirdStepForCylinderTwo ()
{
    global $driver;
    $driver->statusOfOutletValveTwo('close; ');
    $driver->statusOfInletValveTwo('open; ');
    $driver->movePistonTwo('down; ');
}
function actionsInTheFourthStepForCylinderTwo ()
{
    global $driver;
    $driver->statusOfInletValveTwo('close; ');
    $driver->movePistonTwo('up; ');
    $driver->lightInLampTwo('light; ');
}

function actionsInTheFirstStepForCylinderThree ()
{
    global $driver;
    $driver->statusOfInletValveThree('close; ');
    $driver->movePistonThree('up; ');
    $driver->lightInLampThree('light; ');
}
function actionsInTheSecondStepForCylinderThree ()
{
    global $driver;
    $driver->movePistonThree('down; ');
}
function actionsInTheThirdStepForCylinderThree ()
{
    global $driver;
    $driver->statusOfOutletValveThree('open; ');
    $driver->movePistonThree('up; ');
}
function actionsInTheFourthStepForCylinderThree ()
{
    global $driver;
    $driver->statusOfOutletValveThree('close; ');
    $driver->statusOfInletValveThree('open; ');
    $driver->movePistonThree('down; ');
}

function actionsInTheFirstStepForCylinderFour ()
{
    global $driver;
    $driver->statusOfOutletValveFour('close; ');
    $driver->statusOfInletValveFour('open; ');
    $driver->movePistonFour('down; ');
}
function actionsInTheSecondStepForCylinderFour ()
{
    global $driver;
    $driver->statusOfInletValveFour('close; ');
    $driver->movePistonFour('up; ');
    $driver->lightInLampFour('light; ');
}
function actionsInTheThirdStepForCylinderFour ()
{
    global $driver;
    $driver->movePistonFour('down; ');
}
function actionsInTheFourthStepForCylinderFour ()
{
    global $driver;
    $driver->statusOfOutletValveFour('open; ');
    $driver->movePistonFour('up; ');
}

function actionsInTheFirstStepForEngine ()
{
    actionsInTheFirstStepForCylinderOne();
    actionsInTheFirstStepForCylinderTwo();
    actionsInTheFirstStepForCylinderThree();
    actionsInTheFirstStepForCylinderFour();
}

function actionsInTheSecondStepForEngine ()
{
    actionsInTheSecondStepForCylinderOne();
    actionsInTheSecondStepForCylinderTwo();
    actionsInTheSecondStepForCylinderThree();
    actionsInTheSecondStepForCylinderFour();
}

function actionsInTheThirdStepForEngine ()
{
    actionsInTheThirdStepForCylinderOne();
    actionsInTheThirdStepForCylinderTwo();
    actionsInTheThirdStepForCylinderThree();
    actionsInTheThirdStepForCylinderFour();
}

function actionsInTheFourthStepForEngine ()
{
    actionsInTheFourthStepForCylinderOne();
    actionsInTheFourthStepForCylinderTwo();
    actionsInTheFourthStepForCylinderThree();
    actionsInTheFourthStepForCylinderFour();
}

function actionsInTheEngine()
{
    while(true)
    {
        echo "********************************************************* step 1\n";
        actionsInTheFirstStepForEngine();
        echo "********************************************************* step 2\n";
        actionsInTheSecondStepForEngine();
        echo "********************************************************* step 3\n";
        actionsInTheThirdStepForEngine();
        echo "********************************************************* step 4\n";
        actionsInTheFourthStepForEngine();
    }
}
actionsInTheEngine();









