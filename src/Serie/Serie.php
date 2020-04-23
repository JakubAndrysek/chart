<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\Segment;

class Serie extends AbstractSerie
{

	/** @var Segment[] */
	private $segments = [];
	private $array = [];

	public function addSegment(Segment $segment): void
	{
		$this->segments[] = $segment;
	}

	public function addRaw($array): void
	{
		$this->array = $array;
	}
	
	public function enableRaw($array): void
	{
		$this->array = $array;
	}

	/**
	 * @return Segment[]
	 */
	public function getSegments(): array
	{
		return $this->segments;
	}

}
