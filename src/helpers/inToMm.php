<?php

function inToMm($val, $precision = 2)
{
    return round($val * 25.4, $precision);
}
