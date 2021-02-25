<?php

declare(strict_types=1);

namespace App;

use Baraja\PackageManager\PackageRegistrator;
use Nette\Bootstrap\Configurator;


/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{

	/**
	 * @return Configurator
	 */
	public static function boot(): Configurator
	{
		$appDir = __DIR__; /* For future update dirname(__DIR__); */

		new PackageRegistrator(
			$appDir . '/../',    // root path
			$appDir . '/../temp' // temp path
		);

		$configurator = new Configurator;

		//$configurator->setDebugMode('secret@23.75.345.200'); // enable for your remote IP
		$configurator->enableTracy($appDir . '/../log');

		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory($appDir . '/../temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator
			->addConfig($appDir . '/config/package.neon')
			->addConfig($appDir . '/config/common.neon')
			->addConfig($appDir . '/config/local.neon');

		return $configurator;
	}

	/**
	 * @return Configurator
	 */
	public static function bootForTests(): Configurator
	{
		$configurator = self::boot();
		\Tester\Environment::setup();
		return $configurator;
	}
}
