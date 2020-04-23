# Forked from [tlapnet/chart](https://github.com/tlapnet/chart)

## Tlapnet Chart

Graphs and charts based on [C3.js](http://c3js.org/)

-----

[![Build Status](https://img.shields.io/travis/tlapnet/chart.svg?style=flat-square)](https://travis-ci.org/tlapnet/chart)
[![Code coverage](https://img.shields.io/coveralls/tlapnet/chart.svg?style=flat-square)](https://coveralls.io/r/tlapnet/chart)
[![Licence](https://img.shields.io/packagist/l/tlapnet/chart.svg?style=flat-square)](https://packagist.org/packages/tlapnet/chart)

[![Downloads this Month](https://img.shields.io/packagist/dm/tlapnet/chart.svg?style=flat-square)](https://packagist.org/packages/tlapnet/chart)
[![Downloads total](https://img.shields.io/packagist/dt/tlapnet/chart.svg?style=flat-square)](https://packagist.org/packages/tlapnet/chart)
[![Latest stable](https://img.shields.io/packagist/v/tlapnet/chart.svg?style=flat-square)](https://packagist.org/packages/tlapnet/chart)

## Install

```
$ composer require tlapnet/chart
```

## Versions

| State       | Version   | Branch   | PHP      |
|-------------|-----------|----------|----------|
| dev         | `^2.1.0`  | `master` | `>= 7.1` |
| stable      | `^2.0.0`  | `master` | `>= 7.1` |
| stable      | `^1.0.0`  | `master` | `>= 5.4` |

## Changes
- Add Basic chart
![Chart](.docs/assets/BasicChart.png?raw=true)
- Add RAW body to Pie chart, Donut chart, Basic chart

Example more in [Documentation](.docs/README.md)
```php
		$chart = new DonutChart();
		$chart->setTitle("15");
		$chart->setValueSuffix(' pcs');
		
		$chart->enableRaw();
		$chart->addRaw(array(array("a", 1), array("b",2), array("c",3), array("d",12)));
		$this->template->donutRAW = $chart;

```
## Overview

- [Assets](.docs/README.md#assets)
- [Graphs](.docs/README.md#graphs)
	- [Chart](.docs/README.md#chart)
	- [CategoryChart](.docs/README.md#categorychart)
	- [DateChart](.docs/README.md#datechart)
	- [DonutChart](.docs/README.md#donutchart)
	- [PieChart](.docs/README.md#piechart)
- [Series](.docs/README.md#series)
	- [Stacking series](.docs/README.md#stacking-series)
	- [Types](.docs/README.md#types)

## Maintainers

<table>
  <tbody>
    <tr>
      <td align="center">
        <a href="https://github.com/f3l1x">
            <img width="150" height="150" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=150">
        </a>
        </br>
        <a href="https://github.com/f3l1x">Milan Felix Šulc</a>
      </td>
      <td align="center">
        <a href="https://github.com/mabar">
            <img width="150" height="150" src="https://avatars0.githubusercontent.com/u/20974277?s=400&v=4">
        </a>
        </br>
        <a href="https://github.com/mabar">Marek Bartoš</a>
      </td>
    </tr>
  <tbody>
</table>
