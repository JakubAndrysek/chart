# Jakubandrysek Chart

Graphs and charts based on [C3.js](http://c3js.org/)

## Content

- [Assets](#Assets)
- [Graphs](#graphs)
	- [Basic chart](#basicchart)
	- [Chart](#chart)
	- [CategoryChart](#categorychart)
	- [DateChart](#datechart)
	- [DonutChart](#donutchart)
	- [PieChart](#piechart)
- [Series](#series)
	- [Stacking series](#stacking-series)
	- [Types](#types)

## Assets

Graphs are rendered through [C3.js](http://c3js.org/).

```html
<!-- Load c3.css -->
<link href="/path/to/c3.css" rel="stylesheet" type="text/css">
<!-- Load d3.js and c3.js -->
<script src="/path/to/d3.v3.min.js"></script>
<script src="/path/to/c3.min.js"></script>
```

## Graphs

### BasicChart
- name(String) and array(values...)



```php
use Jakubandrysek\Chart\BasicChart;

$chart = new BasicChart();
$basic->addLine("a", array(11,20,22, 18, 35, 16));
$basic->addLine("b", array(20,10,21, 0, 14, 8));

echo $chart;
```
or
- array(String:name, values...)
```php
use Jakubandrysek\Chart\BasicChart;

$chart = new BasicChart();
$chart->addRaw(array(array("a", 11,20,22, 18, 35, 16), array("b",20,10,21, 0, 14, 8)));

echo $chart;
```


![Chart](./assets/BasicChart.png?raw=true)

### Chart

- x (number), y (number)

```php
use Jakubandrysek\Chart\Chart;
use Jakubandrysek\Chart\Serie\Serie;
use Jakubandrysek\Chart\Segment\Segment;

$chart = new Chart();

$serie = new Serie(Serie::LINE, 'Serie 1', 'red');
$serie->addSegment(new Segment(5, 10));
$serie->addSegment(new Segment(6, 4));
$serie->addSegment(new Segment(2, 8));
$chart->addSerie($serie);

$serie = new Serie(Serie::LINE, 'Serie 2');
$serie->addSegment(new Segment(2, 8));
$serie->addSegment(new Segment(4, 6));
$serie->addSegment(new Segment(8, 5));
$serie->addSegment(new Segment(7, 7));
$chart->addSerie($serie);

echo $chart;
```

![Chart](./assets/Chart.png?raw=true)

### CategoryChart

- x (unique key, string|int), y (number)

```php
use Jakubandrysek\Chart\Category;
use Jakubandrysek\Chart\CategoryChart;
use Jakubandrysek\Chart\Serie\CategorySerie;
use Jakubandrysek\Chart\Segment\CategorySegment;

$chart = new CategoryChart([
	new Category(1, 'January'),
	new Category(2, 'February'),
	new Category(3, 'March'),
]);
$chart->setValueSuffix(' $');

$serie = new CategorySerie(CategorySerie::BAR, 'Company 1', 'red');
$serie->addSegment(new CategorySegment(1, 0));
$serie->addSegment(new CategorySegment(2, 4000));
$serie->addSegment(new CategorySegment(3, 1000));
$chart->addSerie($serie, 'group1');

$serie = new CategorySerie(CategorySerie::BAR, 'Company 2', 'green');
$serie->addSegment(new CategorySegment(1, 3000));
// Segments could be omitted (default value is 0)
$serie->addSegment(new CategorySegment(3, 500));
$chart->addSerie($serie, 'group1');

$serie = new CategorySerie(CategorySerie::LINE, 'Summary');
$serie->addSegment(new CategorySegment(1, 3000));
$serie->addSegment(new CategorySegment(3, 1500));
$serie->addSegment(new CategorySegment(2, 4000));
$chart->addSerie($serie);

echo $chart;
```

![CategoryChart](./assets/CategoryChart.png?raw=true)

### DateChart

- x (date), y (number)

```php
use Jakubandrysek\Chart\DateChart;
use Jakubandrysek\Chart\Serie\DateSerie;
use Jakubandrysek\Chart\Segment\DateSegment;
use DateTimeImmutable;

$chart = new DateChart();
$chart->setValueSuffix(' $');
//$chart->enableTimePrecision(); // Enable time accurate to seconds

$serie = new DateSerie(DateSerie::LINE, 'Revenues', 'green');
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-01-01'), 10));
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-02-01'), 4));
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-03-01'), 8));
$chart->addSerie($serie);

$serie = new DateSerie(DateSerie::LINE, 'Costs', 'red');
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-01-01'), 2));
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-02-01'), 9));
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-03-01'), 5));
$chart->addSerie($serie);

$serie = new DateSerie(DateSerie::AREA_LINE, 'Balance', 'blue');
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-01-01'), 8));
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-02-01'), -5));
$serie->addSegment(new DateSegment(new DateTimeImmutable('2012-03-01'), 3));
$chart->addSerie($serie);

echo $chart;
```

![DateChart](./assets/DateChart.png?raw=true)

### DonutChart

```php
use Jakubandrysek\Chart\DonutChart;
use Jakubandrysek\Chart\Segment\DonutSegment;

$chart = new DonutChart();
$chart->setTitle(15);
$chart->setValueSuffix(' pcs');
$chart->enableRatioLabel(); // Show percents instead of absolute values
$chart->addSegment(new DonutSegment('Item 1', 5));
$chart->addSegment(new DonutSegment('Item 2', 8));
$chart->addSegment(new DonutSegment('Item 3', 2));

echo $chart;
```
or
```php
use Jakubandrysek\Chart\DonutChart;

$chart = new DonutChart();
$chart->setTitle(15);
$chart->setValueSuffix(' pcs');
$chart->enableRatioLabel(); // Show percents instead of absolute values
$chart->enableRaw();
$chart->addRaw(array(array("Item 1", 5), array("Item 2",8), array("Item 3",2)));

echo $chart;
```

![DonutChart](./assets/DonutChart.png?raw=true)

### PieChart

```php
use Jakubandrysek\Chart\PieChart;
use Jakubandrysek\Chart\Segment\PieSegment;

$chart = new PieChart();
$chart->enableRatioLabel(); // Show percents instead of absolute values
$chart->setValueSuffix(' pcs');
$chart->addSegment(new PieSegment('Item 1', 5));
$chart->addSegment(new PieSegment('Item 2', 8));
$chart->addSegment(new PieSegment('Item 3', 2));

echo $chart;
```
or
```php
use Jakubandrysek\Chart\PieChart;

$chart = new PieChart();
$chart->enableRatioLabel(); // Show percents instead of absolute values
$chart->setValueSuffix(' pcs');
$chart->enableRaw();
$chart->addRaw(array(array("Item 1", 5), array("Item 2",8), array("Item 3",2)));

echo $chart;
```

![PieChart](./assets/PieChart.png?raw=true)

## Series

Graphs Chart, CategoryChart and DateChart each have their series (Serie, CategorySerie, DateSerie).

### Stacking series

```php
$chart->addSerie($barSerie1, 'group1');
$chart->addSerie($barSerie2, 'group1');
$chart->addSerie($barSerie3, 'group1');
$chart->addSerie($barSerie4, 'group1');
```

```php
// Group name could be any value valid for array key
// Null (default value) mean no group
$chart->addSerie($splineSerie1, 1);
$chart->addSerie($splineSerie2, 1);
```

### Types

- *Serie::BAR
- *Serie::LINE
- *Serie::SPLINE
- *Serie::STEP
- *Serie::AREA_LINE
- *Serie::AREA_SPLINE
- *Serie::AREA_STEP

