<?php

if (! function_exists('lbToKg')) {
    function lbToKg($val, $precision = 2)
    {
        return round($val * 0.453592, $precision);
    }
}
