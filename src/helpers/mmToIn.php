<?php

if (! function_exists('mmToIn')) {
    function mmToIn($val, $precision = 2)
    {
        return round($val / 25.4, $precision);
    }
}
