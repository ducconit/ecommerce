<?php

namespace DNT\Ecommerce\Providers;

use DNT\Ecommerce\Support\Helper;
use DNT\Ecommerce\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\View;

class EcommerceServiceProvider extends ServiceProvider
{

	public function afterRegister(Container $container)
	{
		$container->singleton('helper', function ($app) {
			return new Helper($app);
		});
		View::share('locale', $this->app->getLocale());
	}

	public function configPaths(): array
	{
		return [
			'ecommerce' => __DIR__ . '/../config/ecommerce.php'
		];
	}
}
