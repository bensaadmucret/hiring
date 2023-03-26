<?php

/**
 * [Algo] Fizzbuzz
 *
 * @param integer $n
 * @return array
 */
function fizzbuzz(int $n): array
{
    if ($n <= 0) {
        return [];
    }

    return array_map(function (int $i) {
        if ($i % 15 == 0) {
            return 'FizzBuzz';
        }
        if ($i % 3  == 0) {
            return 'Fizz';
        }
        if ($i % 5  == 0) {
            return 'Buzz';
        }
        return $i;
    }, range(1, $n));
}

$result = fizzbuzz(100);
echo implode(' ', $result);