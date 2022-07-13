<?php

function selectionSort(array $arr): array {

	$length = count($arr);
	for($i = 0; $i < $length; $i++){
		$min = $i;
		for($j = $i+1; $j < $length; $j++){
			if($arr[$j] < $arr[$min]){
				$min = $j;
			}
		}

		if( $min != $i ){
			$tmp = $arr[$i];
			$arr[$i] = $arr[$min];
			$arr[$min] = $tmp;

		}
	}

	return $arr;
}
