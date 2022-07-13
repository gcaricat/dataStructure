<?php

$path = realpath(".");
$files = new RecursiveIteratorIterator(
	new RecursiveDirectoryIterator($path),
	RecursiveIteratorIterator::SELF_FIRST
);

foreach ($files as $name => $file){
	echo "$name\n";
}
echo "\n-----------------------\n";

$teams = array(
	'popular teams',
	array(
		'lega',
		array(
			'Real Madrid',
			'FC BARCELONA',
			'REAL',
			'BETIS',
		),
		array(
			'Englishj premiere league',
			array(
				'Manchester United',
				'Liverpool',
				'Arsenal'
			),
		),
	)
);

$tree = new RecursiveTreeIterator(
	new RecursiveArrayIterator($teams),
	NULL,
	NULL,RecursiveIteratorIterator::LEAVES_ONLY
);

foreach($tree as $leaf){
	echo $leaf.PHP_EOL;
}


function array_sum_recursive(Array $array){
	$sum = 0;
	array_walk_recursive($array, function($v) use (&$sum) {
		$sum += $v;
	});

	return $sum;
}
