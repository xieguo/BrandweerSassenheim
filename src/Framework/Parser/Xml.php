<?php
namespace Base\Framework\Parser;

use Exception;

class Xml
{
    private $filePath;
    private $source;
    private $parsed;

    public function __construct($path)
    {
        if (starts_with($path, '<?')) {
            $this->source = $path;
        } elseif (is_file($path)) {
            $this->filePath = $path;
            $this->source   = file_get_contents($path);
        } else {
            throw new Exception('Could not create parser');
        }

        $parsed = simplexml_load_string($this->source, null, LIBXML_NOCDATA);
        $parsed = json_encode($parsed);
        $parsed = json_decode($parsed, true);

        $this->parsed = $parsed;
    }

    public static function create($path)
    {
        return new self($path);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function get($key = null, $default = null)
    {
        if ($key === null) {
            return $this->parsed;
        }

        return array_get($this->parsed, $key, $default);
    }

    public function getArray($key, $default = null)
    {
        if ($array = array_get($this->parsed, $key)) {
            return array_key_exists(0, $array) ? $array : [$array];
        }

        return $default;
    }
}