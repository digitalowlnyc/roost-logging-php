<?php

namespace Roost\Logging;

class GlobalLogging implements LoggerInterface
{
	use UsesLogger;

	/**
	 * @var GlobalLogging
	 */
	private static $instance;
	private static $logFile = "global.log";

	private $globalLogger = null;

	static function setFile($logFile) {
		static::$logFile = $logFile;
	}

	/**
	 * @return GlobalLogging
	 */
	static function instance() {
		if(static::$instance === null) {
			static::$instance = new GlobalLogging();
		}
		if(empty(static::$instance->getLoggers())) {
			static::$instance->addLogger(new GlobalLogger());
		}

		return static::$instance;
	}
}