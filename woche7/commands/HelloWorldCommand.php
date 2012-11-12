<?php

require_once 'Command.php';

class HelloWorldCommand implements Command {

	public function execute(Request $request, Response $response) {
		if ($request->issetParameter('Name')) {
			$response->write("Hallo ");
			$response->write($request->getParameter('Name'));
		} else {
			$response->write("Hallo Unbekannter");
		}
	}

}

?>