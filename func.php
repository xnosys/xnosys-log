<?php
	
	return function () {
		
		$write = function ($text, $name) {
			$d = substr(preg_replace('/[^a-z0-9]/', '', strtolower($name)), 0, 256);
			if (!strlen($d)) { return false; }
			if (!is_dir(__DIR__.'/-')) { mkdir(__DIR__.'/-'); }
			if (!is_dir(__DIR__.'/-/'.$d)) { mkdir(__DIR__.'/-/'.$d); }
			list($microseconds, $seconds) = explode(' ', microtime());
			$f = date('YmdH', $seconds);
			$t = date('is', $seconds).'.'.substr($microseconds, 2);
			return file_put_contents(__DIR__.'/-/'.$d.'/'.$f.'.txt', $t.':'.PHP_EOL.$text.PHP_EOL.PHP_EOL, FILE_APPEND);
		};
		
		return array(
			'write' => $write
		);
		
	};
	
?>