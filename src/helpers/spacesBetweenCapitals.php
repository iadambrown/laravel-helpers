<?php

function spacesBetweenCapitals($string)
{
    return trim(preg_replace('/(?<! )[A-Z]/', ' $0', $string));
}
