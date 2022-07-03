<?php

	use dataStructure\stackInterface\Books;
	include('Books.php');

	try{
		$programmingBooks = new Books(10);
		$programmingBooks->push("Database");
		$programmingBooks->push("Javascript");
		$programmingBooks->push("PHP8");

		echo $programmingBooks->pop()."\n";
		echo $programmingBooks->top()."\n";

	}catch (Exception $ex){
		echo $ex->getMessage();
	}
