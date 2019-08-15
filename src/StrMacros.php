<?php

namespace iAdamBrown\LaravelHelpers;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class StrMacros
{
    public function between(): callable
    {
        return static function ($subject, $beginning, $end = null) {
            if ($end === null) {
                $end = $beginning;
            }

            return Str::before(Str::after($subject, $beginning), $end);
        };
    }

    public function extract(): callable
    {
        return static function ($string, $pattern) {
            if (@preg_match($pattern, $string) === false) {
                $pattern = '#' . preg_quote($pattern, '#') . '#';
            }

            preg_match($pattern, $string, $matches);

            return $matches[1] ?? null;
        };
    }

    public function match(): callable
    {
        return static function ($string, $pattern) {
            if (@preg_match($pattern, $string) === false) {
                $pattern = '#' . preg_quote($pattern, '#') . '#';
            }

            return preg_match($pattern, $string) === 1;
        };
    }

    public function validate(): callable
    {
        return static function ($data, $rules) {
            return Collection::make(
                Validator::make(['{placeholder}' => $data], ['{placeholder}' => $rules])
                    ->errors()
                    ->get('{placeholder}')
            )->map(static function ($message) {
                return ucfirst(
                    trim(
                        str_replace('The {placeholder}', '',
                            str_replace('The selected {placeholder}', 'This selection',
                                $message)
                        )
                    )
                );
            });
        };
    }

    public function wrap(): callable
    {
        return static function ($value, $cap) {
            return Str::start(Str::finish($value, $cap), $cap);
        };
    }
}
