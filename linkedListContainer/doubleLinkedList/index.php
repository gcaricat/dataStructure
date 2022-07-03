<?php

use dataStructure\doubleLinkedList\DoubleLinkedList;
use dataStructure\doubleLinkedList\ListNode;
require "ListNode.php";
require "doubleLinkedList.php";

$bootTitles = new DoubleLinkedList();
$bootTitles->insertAtFirst("Pippo");
$bootTitles->insertAtFirst("Pluto");

$bootTitles->insertAtLast("ULTIMO");
echo "\n-- display LAST --\n ";
$bootTitles->displayForward();

echo "\n-- display backward --\n ";
$bootTitles->displayBackward();

echo "\n-- display forward --\n ";
$bootTitles->displayForward();


$bootTitles->insertBefore("QUESTO", "Pluto");
echo "\n-- InsertBefore --\n ";
$bootTitles->displayForward();
//$bootTitles->deleteLast();
//echo "\n-- DELETE LAST --\n ";
//$bootTitles->displayForward();
$bootTitles->delete("Pluto");
echo "\n-- DELETE PIPPO --\n ";
$bootTitles->displayForward();
