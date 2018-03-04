<?php
/*
*==============================================================*
* |\      /| | |     /---- |    | | |\   | /----\ |---- |      *
* | \    / | | |     |     |    | | | \  | |      |     |      *
* |  \  /  | | |     |     |----| | |  \ | \----\ |---- |      *
* |   \/   | | |     |     |    | | |   \|      | |     |      *
* |        | | |---- \---- |    | | |    | \----/ |---- |----- *
*==============================================================*
*        Written by Clemens Riese (c)milchinsel.de 2018        *
*==============================================================*
Kontakt:Vertretungsplan Stundenplan Api

Besipiel Stundenplan Generator zum testen
*/

$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];

$CLASSES = [
	"5",
	"6",
	"7",
	"8",
	"9",
	"10",
];

$out = [];

for($lesson = 1; $lesson <= 6; $lesson++) {
	foreach($CLASSES as $class) {
		
	}
}
