<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
error_log("Script cleanup_images.php run " . date('Y-m-d H:i:s'), 3, "cron_log.txt");

$image_folder = 'kamera/KSWHutnik/NABRZEZE/';

$files = scandir($image_folder);


$files = array_diff($files, array('.', '..'));


if (count($files) >= 2) {
    usort($files, function($a, $b) use ($image_folder) {
        return filemtime($image_folder . $b) - filemtime($image_folder . $a);
    });

    $files_to_keep = array_slice($files, 0, 1);

    foreach ($files as $file) {
        if (!in_array($file, $files_to_keep)) {
            $file_path = $image_folder . $file;
            if (is_file($file_path)) {
                unlink($file_path);
            }
        }
    }

    // После удаления файлов, переименовываем оставшийся файл на "brzeg.jpg"
    if (is_file($image_folder . reset($files_to_keep))) {
        rename($image_folder . reset($files_to_keep), $image_folder . 'brzeg.jpg');
    }

    $log_file = 'log.txt';
    $log_message = "Script done " . date('Y-m-d H:i:s');
    file_put_contents($log_file, $log_message . PHP_EOL, FILE_APPEND);
}

?>
