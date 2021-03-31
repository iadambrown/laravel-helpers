<?php

if (! function_exists('user')) {
    function user($guard = null): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth($guard)->user();
    }
}
