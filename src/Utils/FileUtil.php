<?php

namespace Encodeurs\Cruder\Utils;

use Illuminate\Support\Facades\File;

class FileUtil
{
    /**
     * If file does not exist, create new file and put content
     */
    public static function newFile($path, $fileName, $contents)
    {
        $path = $path;
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $file = $path . $fileName;

        file_put_contents($file, $contents);
    }

    /**
     * If file exist, delete file
     */
    public static function deleteFile($path, $fileName)
    {
        $file = $path . $fileName;
        if (file_exists($file)) {
            return unlink($file);
        }

        return false;
    }

    public static function putContent($file, $content)
    {
        file_put_contents($file, $content, FILE_APPEND);
    }

    public static function getContent($file)
    {
        if (!file_exists($file)) {
            return false;
        }

        return file_get_contents($file);
    }

    public static function getContentByPath($file)
    {
        if (!file_exists($file)) {
            return false;
        }

        return file_get_contents($file);
    }
}
