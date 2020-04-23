<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

use Tlapnet\Chart\Segment\PieSegment;

class PieChart extends AbstractChart
{

	/** @var PieSegment[] */
	private $segments = [];
	private $raw = [];
	private $enableRaw = false;

	/** @var bool */
	private $enableRatioLabel = false;

	public function addSegment(PieSegment $segment): void
	{
		$this->segments[] = $segment;
	}

	public function enableRaw(): void
	{
		$this->enableRaw = true;
		$this->segments[] = true;
	}

	public function addRaw($array): void
	{
		$this->raw = $array;
	}

	public function enableRatioLabel(): void
	{
		$this->enableRatioLabel = true;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters(): array
	{
		$params = parent::getTemplateParameters();
		$params['segments'] = $this->segments;
		$params['enableRatioLabel'] = $this->enableRatioLabel;
		$params['enableRaw'] = $this->enableRaw;
		$params['raw'] = $this->raw;

		return $params;
	}

}
