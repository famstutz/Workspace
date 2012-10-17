<?php
require_once('classloader.php');

$car = new car(50);
echo $car->getVelocity();
echo $car->getPassengers();
$car->accelerate();
echo $car->getVelocity();
$car->addPassenger();
$car->addPassenger();
echo $car->getPassengers();
$car->accelerate();
echo $car->getVelocity();
$car->decelerate();
echo $car->getVelocity();
?>