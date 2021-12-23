<?php

/**
 * Aby fidovi nepraslka cevka
 *
 * @param $directory
 */
function fider($directory)
{
    foreach (scandir($directory) as $file)
    {
        if (in_array($file, [".", "..", "vendor", "node_modules", "storage", "database.sqlite"]))
            continue;
        if (is_dir($file))
            fider($file);

        $contents = file_get_contents($file);

        file_put_contents($file, 
            preg_replace_callback("\"(.*?)\"", function($matches) {
                return "'" . preg_replace("$[A-Za-z0-9\[\]]+", '{$1}', $matches[1]) . "'";
        }, $contents));
    }
}
