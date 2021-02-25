<?php

declare(strict_types=1);

namespace App\Router;


use Nette\Application\Routers\RouteList;
use Nette\StaticClass;


/**
 * Class RouterFactory
 * @package App\Router
 */
final class RouterFactory
{
	use StaticClass;

	/**
	 * @return RouteList
	 */
	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router[] = self::createAdminRouter();
		$router[] = self::createFrontRouter();

		return $router;
	}

	/**
	 * @return RouteList
	 */
	private static function createAdminRouter(): RouteList
	{
		$adminRouter = new RouteList('Admin');
		$adminRouter->addRoute('admin/[<locale=cs cs|en>/]<presenter>/<action>', 'Homepage:default');

		return $adminRouter;
	}

	/**
	 * @return RouteList
	 */
	private static function createFrontRouter(): RouteList
	{
		$router = new RouteList('Front');
		$router->addRoute('[<locale=cs cs|en>/]<presenter>/<action>', 'Homepage:default');

		return $router;
	}
}