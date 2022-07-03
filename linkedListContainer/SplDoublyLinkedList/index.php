<?php

$bookTitles = new SplDoublyLinkedList();

for($i = 1;$i < 3;$i++){
	$bookTitles->push("$i Element");
}
$bookTitles->add(1, "First Element");
$bookTitles->add(3, "Last Element");

for($bookTitles->rewind(); $bookTitles->valid(); $bookTitles->next()){
	echo $bookTitles->current()."\n";
}
