<?php

	include_once "BST.php";

try {
	$tree = new BST(10);

	$tree->insert(12);
	$tree->insert(6);
	$tree->insert(3);
	$tree->insert(8);
	$tree->insert(15);
	$tree->insert(13);
	$tree->insert(36);

	echo $tree->search(14) ? "Found" : "Not Found";
	echo "\n";
	echo $tree->search(36) ? "Found" : "Not Found";
	echo "/* print root data */ \n";
	echo $tree->getRoot()->predecessor()->getData();

	echo "/* traverse pre-order */ \n";
	$tree->traverse($tree->getRoot(), 'pre-order');
	echo "\n";
   	echo "/* traverse in-order */ \n";
	$tree->traverse($tree->getRoot(), 'in-order');
	echo "\n";
   	echo "/* traverse post-order */ \n";
   $tree->traverse($tree->getRoot(), 'post-order');

}catch (Exception $e){
	$e->getMessage();
}
