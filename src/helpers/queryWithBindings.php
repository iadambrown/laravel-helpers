<?php

if (! function_exists('queryWithBindings')) {
    function queryWithBindings($query): string
    {
        $addSlashes = str_replace(['?', '%'], ["'?'", '%%'], $query->toSql());

        return vsprintf(str_replace('?', '%s', $addSlashes), $query->getBindings());
    }
}
