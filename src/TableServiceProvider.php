<?php

namespace Ikfed\Table;

use Illuminate\Support\ServiceProvider;
use Ikfed\Table\View\Components\Table;

class TableServiceProvider extends ServiceProvider
{
	public function register()
	{
		//
	}

	public function boot()
	{
		(new BladeDirectives)->register();

		$this->loadViewsFrom(__DIR__.'/../resources/views', 'table');

		$this->loadViewComponentsAs('table', [
			Table::class,
		]);
	}
}
