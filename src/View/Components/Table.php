<?php

namespace Ikfed\Table\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Ikfed\Table\Table as RTable;

class Table extends Component
{
	public $table;

	/**
	 * Create a new component instance.
	 */
	public function __construct(RTable $for)
	{
		$this->table = $for;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View
	{
		return view('table::components.table');
	}
}
