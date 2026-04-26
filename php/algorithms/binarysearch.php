<?php

declare(strict_types=1);

/**
 * Find the index of a value in a sorted array using binary search; returns index and comparison count.
 *
 * @return array{index: int, comparisons: int} index is -1 if the value is not found
 */
function binarySearch(array $sortedNumbers, int $needle): array
{
    $comparisons = 0;
    $sortedNumbers = array_values($sortedNumbers);
    $low = 0;
    $high = count($sortedNumbers) - 1;

    while ($low <= $high) {
        $middle = $low + intdiv($high - $low, 2);
        $comparisons++;
        if ($sortedNumbers[$middle] === $needle) {
            return [
                'index' => $middle,
                'comparisons' => $comparisons
            ];
        }
        if ($needle < $sortedNumbers[$middle]) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }
    return [
        'index' => -1,
        'comparisons' => $comparisons
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
    echo "\n" . termInfo('--- ' . $label . ' ---') . "\n";

    $result = binarySearch(
        sortedNumbers: $testCase[0],
        needle: $testCase[1],
    );
    if ($result['index'] !== -1) {
        echo termSuccess(
            'Found: needle ' . $testCase[1] . ' at index ' . $result['index']
                . ' (value: ' . $testCase[0][$result['index']] . ')'
        );
    } else {
        echo termError('Not found: needle ' . $testCase[1] . ' is not in the array');
    }
    echo "\n" . 'Comparisons: ' . $result['comparisons'];
    echo "\n";
}

// helpers
function termInfo(string $message): string
{
    return "\e[36m" . $message . "\e[0m";
}

function termSuccess(string $message): string
{
    return "\e[32m" . $message . "\e[0m";
}

function termError(string $message): string
{
    return "\e[31m" . $message . "\e[0m";
}
