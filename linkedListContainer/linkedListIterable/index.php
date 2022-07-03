<?php
	namespace dataStructure\linkedList;

//	use dataStructure\linkedList\LinkedListIterable;
//	use dataStructure\linkedList\ListNode;
	require "LinkedListIterable.php";
	require "ListNode.php";


	$bookTitles = new LinkedListIterable();
	$bookTitles->insert("Algorithm");
	$bookTitles->insert("Data Structure");
	$bookTitles->insert("Database");

	$bookTitles->display();

//	echo "\n***** INSERT AT FIRST ****\n";
//	$bookTitles->insertAtFirst("Pino");
//	$bookTitles->display();
//	if($bookTitles->search("Pino")){
//		echo "TROVATO\n";
//	}
//
//	$bookTitles->insertBefore("Alice nel paese", "Pino");
//	echo "\n***** INSERT BEFORE ****\n";
//	$bookTitles->display();

//	$bookTitles->insertAfter("Pippo", "Algorithm introduction");
//	echo "\n-- INSERT AFTER --\n";
//	$bookTitles->display();
//
//	$bookTitles->deleteFirst();
//	echo "\n-- DELETE FIRST --\n";
//	$bookTitles->display();

//	$bookTitles->deleteLast();
//	echo "\n-- DELETE LAST --\n";
//	$bookTitles->display();

//	$bookTitles->delete("Algorithm");//guarda problemi
//	echo "\n-- DELETE Data Structure --\n";
//	$bookTitles->display();

//	$bookTitles->reverse();
//	echo "\n-- REVERSE --\n";
//	$bookTitles->display();

	echo "the first element is ".$bookTitles->getNthNode(1)->getData()."\n";
	echo "titoli:\n";
	for ($bookTitles->rewind(); $bookTitles->valid(); $bookTitles->next()) {
		echo $bookTitles->current() . "\n";
	}

	foreach ($bookTitles as $title){
		echo $title."\n";
	}

