<?php

interface Response {

	public function write($data);

	public function addHeader($name, $value);

	public function setStatus($status);

	public function flush();
}

?>