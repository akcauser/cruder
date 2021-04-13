<?php

namespace Akcauser\Cruder\Utils;

class FileUtil
{
    /**
     * If file does not exist, create new file and put content
     */
    public static function newFile($path, $fileName, $contents)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $path = $path . $fileName;

        file_put_contents($path, $contents);
    }

    /**
     * If directory does not exist, create new directory
     */
    public static function newDirectory($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
    }

    /**
     * If file exist, delete file
     */
    public static function deleteFile($path, $fileName)
    {
        if (file_exists($path . $fileName)) {
            return unlink($path . $fileName);
        }

        return false;
    }
}
