<?php

function binarySearch(array $numbers, int $needle) : bool {
	$low = 0;
	$high = count($numbers) - 1;
	while($low <= $high){
		$mid = (int) ( ($low + $high) / 2 );

		if($numbers[$mid] > $needle){
			$high = $mid - 1;
		}elseif($numbers[$mid] < $needle){
			$low = $mid + 1;
		}else {
			return TRUE;
		}
	}
	return FALSE;
}

function repetitiveBinarySearch(array $numbers, int $nnedle): int {
	$low = 0;
	$high = count($numbers) - 1;
	$firstOccurrence = -1;

	while ($low <= $high){
		$mid = (int) ($low + $high) /2 ;

		if($numbers[$mid] === $nnedle){
			$firstOccurrence = $mid;
			$high = $mid - 1;
		}elseif($numbers[$mid] > $nnedle){
			$high = $mid - 1;
		}else{
			$low = $mid + 1;
		}
	}
	return $firstOccurrence;
}

/**
 * The interpolation search may go to different location based on the value of the
 * searched key. If we are searching a key that is close to beginning of the array, it will go
 * the first part of the array instead of starting form middle
 * @param array $arr
 * @param int $key
 * @return int
 */
function interpolationSearch(array $arr, int $key) : int {
	$low = 0;
	$high = count($arr) - 1;

	while(	$arr[$high] != $arr[$low]
		&& $key >= $arr[$low]
		&& $key <= $arr[$high]
	){
		/* *
		 * Mid equation calculate the probe position
		 */
		$mid = intval(
			$low + ( ($key - $arr[$low]) * ($high - $low)
				/ ($arr[$high] - $arr[$low]))
		);

		if($arr[$mid] < $key)
			$low = $mid + 1;
		elseif ( $key < $arr[$mid] )
				$high = $mid - 1;
		else
			return $mid;
	}

	if($key == $arr[$low]){
		return $low;
	}else{
		return  -1;
	}
}

$numbers = range(1, 200, 5);
$numberSearch = 31;

if( binarySearch($numbers, $numberSearch) ){
	echo "number found\n";
}else{
	echo "number Not found\n";
}
// searching an unsorted array
$numbers = [1, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 5, 5];
$number = 2;

$pos = repetitiveBinarySearch($numbers, $number);

if ($pos >= 0) {
	echo "$number Found at position $pos \n";
} else {
	echo "$number Not found \n";
}


