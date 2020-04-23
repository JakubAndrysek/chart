<?php declare(strict_types = 1);

namespace Tlapnet\Chart;



class BasicChart extends AbstractChart
{

	private $raw = [];



	public function addRaw($array): void
	{
		$this->raw = $array;
	}

	public function addLine($name, $array): void
	{
		array_unshift($array,$name);
		$this->raw[] = $array;
	}	
	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters(): array
	{
		$params = parent::getTemplateParameters();
		$params['raw'] = $this->raw;

		return $params;
	}

}
