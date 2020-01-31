<?php

if (! function_exists('spacesBetweenCapitals')) {
    function spacesBetweenCapitals(string $string): string
    {
        return trim(preg_replace('/(?<! )[A-Z]/', ' $0', $string));
    }
}

