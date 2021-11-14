<?php

namespace DNT\Ecommerce\Support;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider as BaseService;

abstract class ServiceProvider extends BaseService
{
	/**
	 * @var Repository
	 */
	protected $config;

	public function register()
	{
		$app = $this->app;
		// load config
		$this->config = $app['config'];
		$this->configuration();
		$this->afterRegister($app);
	}

	public function boot()
	{

	}

	/**
	 * Cài đặt các gói cấu hình mặc định
	 */
	public function configuration()
	{
		$this->loadConfig($this->configPaths(), 'mergeConfigFrom');
		$this->loadConfig($this->viewPaths(), 'loadViewsFrom');
	}

	protected function loadConfig($data, $method)
	{
		foreach ($data as $key => $path) {
			$this->{$method}($path, $key);
		}
	}

	protected function configPaths(): array
	{
		return [];
	}

	protected function viewPaths(): array
	{
		return [];
	}

	protected function afterRegister(Container $container)
	{
	}
}
