<?php

if (! function_exists('changeArrayKeyRecursive')) {
    function changeArrayKeyRecursive(array $array, array $set): array
    {
        $newArray = [];
        foreach ($array as $k => $v) {
            $key = array_key_exists($k, $set) ? $set[$k] : $k;
            $newArray[$key] = is_array($v) ? changeArrayKeyRecursive($v, $set) : $v;
        }

        return $newArray;
    }
}
