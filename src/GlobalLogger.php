<?php

namespace Roost\Logging;

class GlobalLogger implements LoggerInterface
{
	/**
	 * @var string
	 */
	private $file;

	function __construct($file = "global.log") {
		$this->file = $file;
	}

	public function log($level, $message, array $context = []) {
		file_put_contents($this->file, date("r") . ": [" . $level . "]: " . $message . PHP_EOL, FILE_APPEND);
	}
	
	public function info($message, array $context = []) {
		$this->log("info", $message, $context);
	}

	public function warning($message, array $context = []) {
		$this->log("warning", $message, $context);
	}

	public function error($message, array $context = []) {
		$this->log("error", $message, $context);
	}

	public function debug($message, array $context = []) {
		$this->log("info", $message, $context);
	}
}