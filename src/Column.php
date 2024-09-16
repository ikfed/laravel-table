<?php

namespace Ikfed\Table;

class Column
{
	private $alignment = 'left';
	private $headerAlignment = 'center';
	private $textWrap = true;

	public function __construct(public $name, public $label, $alignment = null, $headerAlignment = null, $textWrap = true)
	{
		if(in_array($alignment, ['left', 'center', 'right']))
			$this->alignment = $alignment;

		if(in_array($headerAlignment, ['left', 'center', 'right']))
			$this->headerAlignment = $headerAlignment;

		$this->textWrap = $textWrap;
	}

	/*
		Возвращает имя класса для заданного $alignment или имя класса для текущего экземпляра
	*/
	public function alignmentClass($alignment = null)
	{
		if(is_null($alignment))
			$alignment = $this->alignment;

		return match ($alignment) {
			'left' => 'text-start',
			'center' => 'text-center',
			'right' => 'text-end'
		};
	}

	public function headerAlignmentClass()
	{
		return $this->alignmentClass($this->headerAlignment);
	}

	public function textWrapClass()
	{
		return $this->textWrap ? '' : 'text-nowrap';
	}

	public function getClasses()
	{
		return trim($this->alignmentClass().' '.$this->textWrapClass());
	}
}