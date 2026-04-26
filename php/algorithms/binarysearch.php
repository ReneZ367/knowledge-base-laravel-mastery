<?php

/**
 * Find the index of a value in a sorted array using binary search; returns index and comparison count.
 *
 * @return array{index: int, comparisons: int} index is -1 if the value is not found
 */
function binarySearch(array $sortedNumbers, int $needle): array
{
    $sortedNumbers = array_values($sortedNumbers);
    $low = 0;
    $high = count($sortedNumbers) - 1;
    $comparisons = 0;

    while ($low <= $high) {
        $mid = intdiv($low + $high, 2);
        $comparisons++;

        if ($sortedNumbers[$mid] === $needle) {
            return [
                'index' => $mid,
                'comparisons' => $comparisons,
            ];
        }

        if ($sortedNumbers[$mid] < $needle) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return [
        'index' => -1,
        'comparisons' => $comparisons,
    ];
}

$testCases = [
    'found in middle' => [[1, 2, 3, 4, 5, 6, 7], 4],
    'found at start' => [[1, 2, 3, 4, 5], 1],
    'found at end' => [[1, 2, 3, 4, 5], 5],
    'not present (between)' => [[1, 2, 4, 5], 3],
    'not present (too small)' => [[2, 4, 6], 1],
    'not present (too large)' => [[2, 4, 6], 9],
    'single element, hit' => [[42], 42],
    'single element, miss' => [[42], 7],
    'empty' => [[], 1],
];

foreach ($testCases as $label => $testCase) {
    [$list, $needle] = $testCase;
    $result = binarySearch($list, $needle);
    echo "{$label}\n";
    echo "comparisons {$result['comparisons']}\n\n";
    echo "index {$result['index']}\n\n";
    echo print_r($list, true);
}
