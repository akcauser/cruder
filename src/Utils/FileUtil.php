<?php

namespace Akcauser\Cruder\Utils;

use Illuminate\Support\Facades\File;

class FileUtil
{
    /**
     * If file does not exist, create new file and put content
     */
    public static function newFile($path, $fileName, $contents)
    {
        $path = base_path($path);
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
        $file = base_path($path . $fileName);
        if (file_exists($file)) {
            return unlink($file);
        }

        return false;
    }

    public static function putContent($file, $content)
    {
        file_put_contents(base_path($file), $content, FILE_APPEND);
    }

    public static function getContent($file)
    {
        $file = base_path($file);
        if (!file_exists($file)) {
            return false;
        }

        return file_get_contents($file);
    }
}
