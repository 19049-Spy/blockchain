<?php
require('./class/Block.php');
require('./class/Chain.php');

$b1 = new b(1, new DateTime(), "Varnsdorf", "0");
$b2 = new b(2, new DateTime(), "Rumburk", $b1->generateHash());

$ch = new ch();
$ch->addb($b1);
$ch->addb($b2);

echo($ch);

echo "Is chain valid? " . var_export($ch->isValid(), true) . "\n";

$b = $ch->getBlock(2);
if (!is_null($b)) {
    $b->setContent("Rumburk 2");
}
echo "Is chain valid? " . var_export($ch->isValid(), true) . "\n";
