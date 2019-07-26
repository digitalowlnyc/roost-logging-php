<?php

namespace Roost\Logging;

trait UsesLogger {
	/** @var LoggerInterface */
	private $logger;

	public function addLogger($logger) {
		if(!is_array($this->logger)) {
			if($this->logger !== null) {
				$loggers = [$this->logger];
			} else {
				$loggers = [];
			}
		} else {
			$loggers = $this->logger;
		}

		$loggers[] = $logger;

		$this->logger = $loggers;
	}

	/**
	 * @return LoggerInterface[]
	 */
	public function getLoggers() {
		if(!is_array($this->logger)) {
			if($this->logger !== null) {
				return [$this->logger];
			} else {
				return [];
			}
		} else {
			return $this->logger;
		}
	}

	public function setLogger($logger) {
		$this->logger = $logger;
	}

	public function log($level, $message, array $context = []) {
		foreach($this->getLoggers() as $logger) {
			$logger->log($level, $message, $context);
		}
	}

 	public function info($message, array $context = []) {
		foreach($this->getLoggers() as $logger) {
			$logger->info($message, $context);
		}
	}

	public function warning($message, array $context = []) {
		foreach($this->getLoggers() as $logger) {
			$logger->warning($message, $context);
		}
	}

	public function error($message, array $context = []) {
		foreach($this->getLoggers() as $logger) {
			$logger->error($message, $context);
		}
	}

	public function debug($message, array $context = []) {
		foreach($this->getLoggers() as $logger) {
			$logger->info($message, $context);
		}
	}
}