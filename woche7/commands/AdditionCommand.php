<?php

require_once 'Command.php';

class AdditionCommand implements Command {

	public function execute(Request $request, Response $response) {

		if (!$request->issetParameter('a') || !$request->issetParameter('b')) {
			$response->write('Bitte Parameter "a" und Parameter "b" setzen.');
		} else {
			$a = (int) $request->getParameter('a');
			$b = (int) $request->getParameter('b');
			$sum = $a + $b;
			$response->write("{$a} + {$b} = {$sum}");
		}
	}

}

?>