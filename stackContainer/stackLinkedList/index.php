<?php
	namespace dataStructure\stackLinkedList;

	use PHPUnit\DbUnit\Operation\Exception;
	use dataStructure\stackLinkedList\Stack;
	use dataStructure\stackLinkedList\BookList;

	include_once "BookList.php";
	include_once "Stack.php";


try{
	$books = new BookList();
	$books->push("first");
	$books->push("second");
	$books->push("third");

	echo $books->pop()."\n";
//	echo $books->pop()."\n";
//	echo $books->pop()."\n";
}catch (Exception $e){
	echo $e->getMessage();
}
