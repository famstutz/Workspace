<?php

require_once 'Command.php';

class BrowserInfoCommand implements Command {

	public function execute(Request $request, Response $response) {
		$response->write('Ihr Browser: ');
		$response->write($request->getHeader('User-Agent'));
	}

}

?>