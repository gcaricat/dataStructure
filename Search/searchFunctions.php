<?php

/**
 * @param array $arr
 * @param int $key
 * @return int
 */
function interpolationSearch(array $arr, int $key): int {
	$low = 0;
	$hight = count($arr) - 1;

	while( $arr[$hight] != $arr[$low] && $key >= $arr[$low] && $key <= $arr[$hight]){
		$mid = intval($low + (($key - $arr[$low]) * ($high - $low)
		 				/ ($arr[$high] - $arr[$low]))
				);

		if ($arr[$mid] < $key) {
			$low = $mid + 1;
		}elseif ($key < $arr[$mid]){
			$hight = $mid - 1;
		}else{
			return $mid;
		}
	}

	if($key == $arr[$low]){
		return $low;
	}

	return - 1;
}

function exponentialSearch(array $arr, int $key): int {
	$size = count($arr);

	if($size == 0)
		return -1;

	$bound = 1;
	while($bound < $size && $arr[$bound] < $key) {
		$bound *= 2;
	}
	return binarySearch($arr, $key, intval($bound / 2), min($bound, $size));
}
