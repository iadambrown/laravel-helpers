<?php

function kgToLb($val, $precision = 2)
{
    return round($val * 2.20462, $precision);
}
