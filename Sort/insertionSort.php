<?php

	function insertionSort(array &$array){
		$length = count($array);
		for($i = 0; i < $length; $i++){
			$key = $array[$i];
			$j = $i - 1;

			while($j >= 0 && $array[$i] > $key){
				$array[$j+1] = $array[$j];
				$j--;
			}
			$array[$j+1] = $key;
		}
	}

	$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
	insertionSort($arr);
	echo implode(",", $arr);
