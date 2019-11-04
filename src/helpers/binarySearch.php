<?php

function binarySearch($array, $value)
{
    // Set the left pointer to 0.
    $left = 0;
    // Set the right pointer to the length of the array -1.
    $right = count($array) - 1;

    while ($left <= $right) {
        // Set the initial midpoint to the rounded down value of half the length of the array.
        $midpoint = (int)floor(($left + $right) / 2);

        if ($array[$midpoint] < $value) {
            // The midpoint value is less than the value.
            $left = $midpoint + 1;
        } elseif ($array[$midpoint] > $value) {
            // The midpoint value is greater than the value.
            $right = $midpoint - 1;
        } else {
            // This is the key we are looking for.
            return $midpoint;
        }
    }

    // The value was not found.
    return null;
}
