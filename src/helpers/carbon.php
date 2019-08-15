<?php

use Carbon\Carbon;

/**
 * @param mixed ...$args
 *
 * @return Exception|Carbon
 */
function carbon(...$args)
{
    try {
        return new Carbon(...$args);
    } catch (Exception $e) {
        return $e;
    }
}