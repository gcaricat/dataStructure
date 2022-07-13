<?php


	/**
	 * If parenthesis is open we have to push into the stack
	 * if closed we have to pop.
	 * if the popped parenthesis is not the opening we have to tring to match
	 * at the end of the loop if the stack is empty then is valid
	 */

	function checkParenthesis(string $expression): bool{
		$valid = true;
		$stack = new SplStack();

		for($i = 0; $i < strlen($expression); $i++){
			$char = substr($expression, $i, 1);

			switch ($char){
				case "(":
				case "[":
				case "{":
					$stack->push($char);
					break;

				case ")":
				case "]":
				case "}":
					if($stack->isEmpty()){
						$valid = false;
					}else{
						$last = $stack->pop();

						if(
							( ( $char == ")" ) && $last != "("  ) ||
							( ( $char == "]" ) && $last != "["  ) ||
							( ( $char == "}" ) && $last != "{"  )

						){
							$valid = false;
						}
					}
					break;
			}

			if(!$valid) break;
		}

		if(!$stack->isEmpty()) $valid = false;

		return $valid;
	}

	$expression = [];
	$expression[] = "8 * (9-2)+ { (4*5) / (2*2) }";
	$expression[] = "8 * 8 ( 3 + 2 ( 1 )";
	$expression[] = "8 * 8 ( 3 + 2 ( 1 ) )";

	foreach ($expression as $item) {
		$valid = checkParenthesis($item);

		echo ($valid) ? "Expression is Valid\n" : "Expression is not valid\n";
	}
