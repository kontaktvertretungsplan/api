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

// Inhalte

// Klassen
$CLASSES = [
	"5",
	"6",
	"7",
	"8",
	"9",
	"10",
];

// Anmerkungen
$NOTICES = [
	"Klausurenphase: Bitte Ruhe in den Pausen",
	"Schulleitung heute abesend",
	"Klasse 6d auf Klassenfahrt",
	"Heute gibts Kuchen in der Pause",
	
];



// Inputs
$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];



// Ausgabevariable
$out = [];

// Systemstatus
$out["ok"] = true;

// Systeminfo
$out["info"] = [
	"api" => [
		"version" => "1",	
	],
];

// Inhalte

// Stundenplanstatus
$out["result"]["status"] = "ok";

// Datum
$out["result"]["date"] = [
	"year" => $year,
	"month" => $month,
	"day" => $day,
];

// Stundenplan Inhalte
/*for($lesson = 1; $lesson <= 6; $lesson++) {
	foreach($CLASSES as $class) {
		
	}
}*/

// Anmerkungen
$notice = [];
for($n = 0; $n <= rand(0, round((count($NOTICES)-1)/2)); $n++) {
	while(!isset($notice[$n])) {
		$n = rand(0, count($NOTICES)-1);
		if(!in_array($NOTICES[$n], $notice)) {
			$notice[] = $NOTICES[$n];
		}
	}
}

foreach($notice as $n => $note) {
	$out["note"][$n] = [
		"0" => $note,
	];
}

header("Content-Type: application/json");

echo json_encode($out);