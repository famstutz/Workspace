<?php

interface Request {

	public function issetParameter($name);

	public function getParameter($name);

	public function getParameterNames();

	public function getHeader($name);
}

?>