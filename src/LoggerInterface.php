<?php

namespace Roost\Logging;

interface LoggerInterface
{
	public function log($level, $message, array $context = []);

	public function info($message, array $context = []);

	public function warning($message, array $context = []);

	public function error($message, array $context = []);

	public function debug($message, array $context = []);
}