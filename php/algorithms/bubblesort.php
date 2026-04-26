<?php

/**
 * Sort a copy of the list using bubble sort; returns sorted values and metrics.
 *
 * @return array{sorted: array<int, int>, swaps: int, comparisons: int}
 */
function bubbleSort(array $numbers): array
{
    $numbers = array_values($numbers);
    $numbersLength = count($numbers);
    $swaps = 0;
    $comparisons = 0;

    for ($s = 0; $s < $numbersLength - 1; $s++) {
        $swapped = false;
        for ($i = 0; $i < $numbersLength - 1 - $s; $i++) {
            $comparisons++;
            if ($numbers[$i] > $numbers[$i + 1]) {
                $temp = $numbers[$i];
                $numbers[$i] = $numbers[$i + 1];
                $numbers[$i + 1] = $temp;
                $swaps++;
                $swapped = true;
            }
        }
        if ($swapped === false) {
            break;
        }
    }

    return [
        'sorted' => $numbers,
        'swaps' => $swaps,
        'comparisons' => $comparisons,
    ];
}

$testCases = [
    [9, 6, 5, 4, 3, 9, 7, 2],
    [1, 2, 3, 4, 5],
    [5, 4, 3, 2, 1],
    [3, 3, 3, 3, 3],
    [3],
];

foreach ($testCases as $testCase) {
    $result = bubbleSort($testCase);
    echo "swap {$result['swaps']}\n\n";
    echo "comparisons {$result['comparisons']}\n\n";
    echo print_r($result['sorted'], true);
}
