<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Polyfill\Php84 as p;

if (\PHP_VERSION_ID >= 80400) {
    return;
}

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string, ?string $encoding = null): string { return p\Php84::mb_ucfirst($string, $encoding); }
}

if (!function_exists('mb_lcfirst')) {
    function mb_lcfirst($string, ?string $encoding = null): string { return p\Php84::mb_lcfirst($string, $encoding); }
}

if (!function_exists('array_find')) {
    function array_find(array $array, callable $callback) { return p\Php84::array_find($array, $callback); }
}

if (!function_exists('array_find_key')) {
    function array_find_key(array $array, callable $callback) { return p\Php84::array_find_key($array, $callback); }
}

if (!function_exists('array_any')) {
    function array_any(array $array, callable $callback): bool { return p\Php84::array_any($array, $callback); }
}

if (!function_exists('array_all')) {
    function array_all(array $array, callable $callback): bool { return p\Php84::array_all($array, $callback); }
}
