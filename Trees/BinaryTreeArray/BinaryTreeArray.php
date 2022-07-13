<?php

/**
 *          			0
 * 				1				2
 * 			3		4		5		6
 *
 *  if i is our node number then:
 * - left node = 2*i+ 1
 * - right node = 2*(i+1)
 *
 *
 */

class BinaryTreeArray {
	private $nodes =  [];

	public function __construct(Array $nodes)
	{
		$this->nodes = $nodes;
	}

	public function traverse(int $num = 0, int $level = 0){
		if(isset($this->nodes[$num])){
			echo str_repeat("-", $level);
			echo $this->nodes[$num]."\n";

			$this->traverse(2 * $num + 1, $level+1);
			$this->traverse(2 * ($num + 1), $level+1);
		}
	}
}

$nodes = [];
$nodes[] = "Final";
$nodes[] = "Semi Final 1";
$nodes[] = "Semi Final 2";
$nodes[] = "Quarter Final 1";
$nodes[] = "Quarter Final 2";
$nodes[] = "Quarter Final 3";
$nodes[] = "Quarter Final 4";

$tree = new BinaryTreeArray($nodes);
$tree->traverse(0);
