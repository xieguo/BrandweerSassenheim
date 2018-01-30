<?php

/**
 * Little helper to replace words in a string
 * found in lang/{locale}/custom.php
 *
 * @param string $string
 * @return string
 */
function t($string)
{
    $locale = config('app.locale');
    $filepath = "lang/{$locale}/custom.php";

    $translations = require resource_path($filepath);

    return str_replace(array_keys($translations), array_values($translations), $string);
}

/**
 * @param $filename
 * @return string
 */
function url_cdn($filename)
{
    return config('filesystems.disks.spaces.url') . '/' . $filename;
}
