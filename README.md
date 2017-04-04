# Algorithm

## Installation

The preferred method of installation is via [Packagist](https://packagist.org/) and [Composer](https://getcomposer.org/). Run the following command to install the package and add it as a requirement to your project's `composer.json`:

```bash
composer require frowhy/algorithm
```

## Example
```php
use Frowhy\Algorithm\Algorithm;

require_once __DIR__ . '/vendor/autoload.php';
$total = 20;
$arr = [];
for ($i = 0; $i < $total; $i++) {
    $arr[] = rand(-10000, 10000);
}

$quickSort = Algorithm::quickSort($arr);
$bubbleSort = Algorithm::bubbleSort($arr);
$selectionSort = Algorithm::selectionSort($arr);
$insertionSort = Algorithm::insertionSort($arr);
$shellSort = Algorithm::shellSort($arr);
$mergeSort = Algorithm::mergeSort($arr);
$countingSort = Algorithm::countingSort($arr);
$heapSort = Algorithm::heapSort($arr);

print_r([
    '原数组' => $arr,
    '快速排序' => $quickSort,
    '冒泡排序' => $bubbleSort,
    '直接选择排序' => $selectionSort,
    '插值排序' => $insertionSort,
    '希尔排序' => $shellSort,
    '归并排序' => $mergeSort,
    '计算排序' => $countingSort,
    '堆排序' => $heapSort,
]);
