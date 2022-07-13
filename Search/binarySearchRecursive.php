<?php

function binarySearchRecursive(array $numbers, int $needle, int $low, int $hight){

	if($hight < $low)
		return false;

	$mid = (int)  ($low + $hight) / 2;

	if($numbers[$mid] > $needle){
		return binarySearchRecursive($numbers, $needle, $low, $mid - 1);
	}elseif($numbers[$mid] < $needle){
		return binarySearchRecursive($numbers, $needle, $mid + 1, $hight);
	}else{
		return true;
	}
}

function repetitiveBinarySearch(array $numbers, int $needle): int {
	$low = 0;
	$hight = count($numbers) - 1;
	$firstoccurence = -1;

	while ($low <= $hight){
		$mid = (int) ( ($low + $hight) / 2 );

		if($numbers[$mid] === $needle){
			$firstoccurence = $mid;
			$hight = $mid - 1;
		}elseif($numbers[$mid]  > $needle){
			$hight = $mid - 1;
		}else{
			$low = $mid + 1;
		}
	}
	return $firstoccurence;
}

$needle = 54;
$numbers = range(1, 200, 5);

	if( binarySearchRecursive($numbers, $needle, 0, count($numbers)- 1) !== FALSE ){
		echo "NUMBER FOUND".PHP_EOL;
	}else{
		echo "NUMBER NOT FOUND".PHP_EOL;
	}
