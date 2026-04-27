<?php

declare(strict_types=1);

function selectionSort(array $unsortedArray): array
{
    $array = array_values($unsortedArray);
    $arrayLength = count($array);
    $comparisons = 0;
    $swaps = 0;
    for ($s = 0; $s < $arrayLength; $s++) {
        $minIndex = $s;
        for ($i = $s + 1; $i < $arrayLength; $i++) {
            if ($array[$i] < $array[$minIndex]) {
                $minIndex = $i;
            }
            $comparisons++;
        }
        if ($s != $minIndex) {
            $temp = $array[$s];
            $array[$s] = $array[$minIndex];
            $array[$minIndex] = $temp;
            $swaps++;
        }
    }

    return [
        'comparisons' => $comparisons,
        'swaps' => $swaps,
        'sortedArray' => $array
    ];
}

$testCases = [
    'empty' => [
        'unsorted' => [],
        'sorted' => [],
    ],
    'single' => [
        'unsorted' => [42],
        'sorted' => [42],
    ],
    'twoSorted' => [
        'unsorted' => [1, 2],
        'sorted' => [1, 2],
    ],
    'twoReversed' => [
        'unsorted' => [2, 1],
        'sorted' => [1, 2],
    ],
    'reversed1To9' => [
        'unsorted' => [9, 8, 7, 6, 5, 4, 3, 2, 1],
        'sorted' => [1, 2, 3, 4, 5, 6, 7, 8, 9],
    ],
    'bookends1And9' => [
        'unsorted' => [1, 8, 7, 6, 5, 4, 3, 2, 9],
        'sorted' => [1, 2, 3, 4, 5, 6, 7, 8, 9],
    ],
    'alreadySorted' => [
        'unsorted' => [1, 2, 3, 4, 5],
        'sorted' => [1, 2, 3, 4, 5],
    ],
    'reversedShort' => [
        'unsorted' => [5, 4, 3, 2, 1],
        'sorted' => [1, 2, 3, 4, 5],
    ],
    'randomOrder' => [
        'unsorted' => [3, 1, 4, 1, 5, 9, 2, 6],
        'sorted' => [1, 1, 2, 3, 4, 5, 6, 9],
    ],
    'allDuplicates' => [
        'unsorted' => [7, 7, 7, 7],
        'sorted' => [7, 7, 7, 7],
    ],
    'withNegatives' => [
        'unsorted' => [3, -1, 0, -2, 2],
        'sorted' => [-2, -1, 0, 2, 3],
    ],
    'pairsOfDuplicates' => [
        'unsorted' => [2, 2, 1, 1],
        'sorted' => [1, 1, 2, 2],
    ],
];

foreach ($testCases as $label => $testCase) {
    termInfo("--- " . $label . " ---\n");
    $result = selectionSort($testCase['unsorted']);
    termInfo("comparisons: " . $result['comparisons']);
    termInfo("swaps: " . $result['swaps']);

    if (array_values($testCase['sorted']) == array_values($result['sortedArray'])) {
        termSuccess("\nSuccessfully sorted");
    } else {
        termError("\nArray not sorted:" . $label);
        termSuccess("\nSorted array:\n\n" . print_r($testCase['sorted'], true));
        termError("\nResult array:\n\n" . print_r($result['sortedArray'], true));
    }
}

// helpers
function termInfo(string $message): void
{
    echo "\e[36m" . $message . "\e[0m\n";
}

function termSuccess(string $message): void
{
    echo "\e[32m" . $message . "\e[0m\n";
}

function termError(string $message): void
{
    echo "\e[31m" . $message . "\e[0m\n";
}
