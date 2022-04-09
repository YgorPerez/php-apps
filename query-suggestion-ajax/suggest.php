<?php
//People Array @TODO - Get from db
$people[] = 'Steve';
$people[] = 'John';
$people[] = 'Mike';
$people[] = 'Tom';
$people[] = 'Bob';
$people[] = 'Hal';
$people[] = 'Bill';
$people[] = 'Johanna';
$people[] = 'Sally';
$people[] = 'Shawn';
$people[] = '0livia';
$people[] = 'Mia';
$people[] = 'Evan';
$people[] = 'Katie';
$people[] = 'Jillian';
$people[] = 'Jose';
$people[] = 'Kathy';

// get query string
$q = $_REQUEST['q'];

$suggestion = '';

// get suggestions
if ($q !== '') {
	$q = strtolower($q);
	$len = strlen($q);
	foreach ($people as $person) {
		if (stristr($q, substr($person, 0, $len))) {
			if ($suggestion == '') {
				$suggestion = $person;
			} else {
				$suggestion .= ", $person";
			}
		}
	}
}

echo $suggestion === '' ? 'No suggestion' : $suggestion;
?>
