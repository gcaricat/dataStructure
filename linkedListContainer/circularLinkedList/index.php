<?php

use dataStructure\circularLinkedList\CircularLinkedList;

require "ListNode.php";
require "CircularLinkedList.php";

$bookTitles = new CircularLinkedList();
$bookTitles->insertAtEnd("Algorithm");
$bookTitles->insertAtEnd("Best Programming");
$bookTitles->insertAtEnd("Clean Code");

$bookTitles->display();

/** INSERT FIRST */
echo "\n---- INSERT FIRST CIAO ----\n";
$bookTitles->insertAtFirst("CIAO");
$bookTitles->display();
echo "\n---- DELETE FIRST CIAO ----\n";
$bookTitles->deleteFirst();
$bookTitles->display();

