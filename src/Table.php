<?php

namespace Ikfed\Table;

use Illuminate\Database\Eloquent\Collection;
use Ikfed\Table\Column;

class Table
{
	public $records;
	protected Collection $columns;

	public function __construct($resource)
	{
		$this->records = $resource;
		$this->columns = new Collection;
	}

	public static function for($resource): static
	{
		return new static($resource);
	}

	public function column($name, $label, $alignment = null, $headerAlignment = null, $textWrap = true): self
	{
		$this->columns = $this->columns->reject(function (Column $column) use ($name){
			return $column->name === $name;
		})->push(new Column(name: $name, label: $label, alignment: $alignment, headerAlignment: $headerAlignment, textWrap: $textWrap))->values();

		return $this;
	}

	public function columns(): Collection
	{
		return $this->columns;
	}
}
