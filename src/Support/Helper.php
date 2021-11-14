<?php

namespace DNT\Ecommerce\Support;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Traits\Macroable;

class Helper
{
	use Macroable;

	/**
	 * @var Container|Application|mixed
	 */
	private $container;

	public function __construct(Container $container = null)
	{
		$this->container = $container ?: app();
	}


}
