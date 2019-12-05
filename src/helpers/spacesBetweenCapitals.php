<?php

function spacesBetweenCapitals(string $string): string
{
    return trim(preg_replace('/(?<! )[A-Z]/', ' $0', $string));
}
