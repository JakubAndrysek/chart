<?php declare(strict_types = 1);

namespace Jakubandrysek\Chart;

use Jakubandrysek\Chart\Segment\DonutSegment;

class DonutChart extends AbstractChart
{

	/** @var DonutSegment[] */
	private $segments = [];
	private $raw = [];
	private $enableRaw = false;

	/** @var string */
	private $title = '';

	/** @var bool */
	private $enableRatioLabel = false;

	public function addSegment(DonutSegment $segment): void
	{
		$this->segments[] = $segment;
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
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
		$params['title'] = $this->title;
		$params['segments'] = $this->segments;
		$params['enableRatioLabel'] = $this->enableRatioLabel;
		$params['enableRaw'] = $this->enableRaw;
		$params['raw'] = $this->raw;

		return $params;
	}

}
