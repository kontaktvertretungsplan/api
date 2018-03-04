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

// Fach
function randomSubject() {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < 2; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return strtoupper($randomString);
}

// Lehrer
function randomTeacher() {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < rand(4, 8); $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return ucfirst(strtolower($randomString));
}

// Räume
function randomRoom() {
	return str_pad(rand(1, 300), 3, "0", STR_PAD_LEFT);
}



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
for($lesson = 1; $lesson <= 6; $lesson++) {
	foreach($CLASSES as $class) {
		$subject = randomSubject();
		$teacher = randomTeacher();
		$room = randomRoom();
		$out["plan"][$lesson][$class][$subject] = [
			"lesson-id" => $class."/".$subject,
			"lesson" => $subject,
			"teacher-id" => substr(strtoupper($teacher), 4);
			"teacher" => $teacher,
			"room-id" => $room,
			"room" => $room,
			"status" => "ok",
			"note" => "",
		];
	}
}

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