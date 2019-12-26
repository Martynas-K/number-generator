<?php
declare(strict_types = 1);

// ------ Initial data
const ITERATIONS = 1000000;
const MULTIPLIER_A = 16807;
const MULTIPLIER_B = 48271;
const DIVIDER = 2147483647; // pow(2, 31) - 1;

$a = 65;
$b = 8921;
//$a = 635;
//$b = 12;

// ------ Helper functions
/**
 * @param $initialValue
 * @param $multiplier
 * @return int
 */
function generateNextNumber ($initialValue, $multiplier): int {
        return ($initialValue * $multiplier) % DIVIDER;
}

/**
 * @param $valueA
 * @param $valueB
 * @return bool
 */
function checkCondition ($valueA, $valueB): bool {
    $comparisonValue = 0b11111111;
    return (($valueA & $comparisonValue) === ($valueB & $comparisonValue)) ? true : false;
}

// ------ Main function
/**
 * @param $numberA
 * @param $numberB
 * @return int
 */
function countMatchedCases ($numberA, $numberB): int {
    $count = 0;
    for ($i = 0; $i < ITERATIONS; $i++) {
        $numberA = generateNextNumber($numberA, MULTIPLIER_A);
        $numberB = generateNextNumber($numberB, MULTIPLIER_B);

        if (checkCondition($numberA, $numberB)) {
            $count++;
        }
    }
    return $count;
}

// ------ Printing results
echo 'Number of matched cases: ' . countMatchedCases($a, $b);
