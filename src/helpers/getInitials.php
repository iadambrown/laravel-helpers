<?php

if (! function_exists('getInitials')) {

    function getInitials(string $name): string
    {
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper($words[0][0] . end($words)[0]);
        }

        return makeInitialsFromSingleWord($name);
    }
}

if (! function_exists('makeInitialsFromSingleWord')) {
    function makeInitialsFromSingleWord(string $name): string
    {
        preg_match_all('#([A-Z]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }

        return strtoupper(substr($name, 0, 2));
    }
}

