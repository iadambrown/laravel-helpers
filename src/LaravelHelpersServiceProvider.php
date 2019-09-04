<?php

namespace iAdamBrown\LaravelHelpers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class LaravelHelpersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load the methods of a mixin class instance into the target class as macro methods.
        Str::mixin(new StrMacros);

        // Loop through the helpers directory, and require each file found, if the function name matches the file name.
        foreach (scandir(__DIR__ . DIRECTORY_SEPARATOR . 'helpers') as $helperFile) {
            $path = sprintf(
                '%s%s%s%s%s',
                __DIR__,
                DIRECTORY_SEPARATOR,
                'helpers',
                DIRECTORY_SEPARATOR,
                $helperFile
            );

            if (! is_file($path)) {
                continue;
            }

            $function = Str::before($helperFile, '.php');

            if (! function_exists($function)) {
                require $path;
            }
        }
    }
}
