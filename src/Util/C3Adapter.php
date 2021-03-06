<?php declare(strict_types = 1);

namespace Jakubandrysek\Chart\Util;

use Jakubandrysek\Chart\Serie\AbstractSerie;

class C3Adapter
{

	public function getSerieType(string $libraryType): string
	{
		$bridge = [
			AbstractSerie::AREA_LINE => 'area',
		];

		if (isset($bridge[$libraryType])) {
			return $bridge[$libraryType];
		}

		return str_replace('_', '-', $libraryType);
	}

}
