<?php
require_once('classloader.php');

$human = new Human("Florian", "male");
echo "<p>" . $human->getName() . "</p>";
$human->rename("Rudolf");
echo "<p>" . $human->getAge() . "</p>";
echo "<p>" . get_class($human) . "</p>";
echo "<p>" . $human->getAncestor() . "</p>";
$human->newEvolutionTheory("Alien");
echo "<p>" . $human->getAncestor() . "</p>";
$bankClerk = new Swiss("Hans", "male");
$bankClerk->rename("Ueli");
?>
