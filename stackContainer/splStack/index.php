<?php

$books = new SplStack();
$books->push("first");
$books->push("second");
$books->push("third");
echo $books->pop()."\n";
echo $books->top()."\n";
echo $books->top()."\n";
