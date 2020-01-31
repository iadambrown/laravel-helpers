<?php

use Illuminate\Support\Carbon;

if (! function_exists('carbon')) {
    function carbon(...$args)
    {
        try {
            return new Carbon(...$args);
        } catch (Exception $e) {
            return $e;
        }
    }
}
