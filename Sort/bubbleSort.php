<?php

function bubbleSort(array $arr): array{
	$count = 0;
	$length = count($arr);

	for($i = 0; $i < $length; $i++){
		for($j = 0; j < $length - 1; $j++){
			$count++;
			if( $arr[$j] > $arr[$j+1] ){
				$tmp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
	}
	echo $count;
	return $arr;
}

function bubbleSortFlag(array $arr): array{
	$length = count($arr);

	for($i = 0; $i < $length; $i++){
		$swappedFlag = FALSE;
		for($j = 0; $j < $length - $i - 1; $j++){
			if($arr[$j] > $arr[$j + 1] ){
				$tmp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
				$swappedFlag = TRUE;
			}
		}

		if(!$swappedFlag){
			break;
		}
	}
	return  $arr;
}

function bubbleSortBound(array $arr): array{
	$length = count($arr);
	$count = 0;
	$bound = $length - 1;

	for($i = 0; $i < $length; $i++){
		$swappedFlag = FALSE;
		$newBound = 0;

		for($j = 0; $j < $bound; $j++){
			$count++;
			if($arr[$j] > $arr[$j + 1] ){
				$tmp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
				$swappedFlag = TRUE;
				$newBound = $j;
			}
		}
		$bound = $newBound;

		if(!$swappedFlag){
			break;
		}
	}
	echo $count."\n";
	return  $arr;
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
$sortedArray = bubbleSort($arr);
echo implode(",", $sortedArray);
