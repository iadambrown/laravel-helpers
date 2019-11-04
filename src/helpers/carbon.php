<?php

use Illuminate\Support\Carbon;

function carbon(...$args)
{
    try {
        return new Carbon(...$args);
    } catch (Exception $e) {
        return $e;
    }
}
