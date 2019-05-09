<?php

$pages = file('mvc.su.csv');
foreach ($pages as $page) {
    $page = trim($page);
    $pageData = explode(';', $page);
    $currentPath = str_replace('mvc.su', '', $pageData[1]);
    $extension = pathinfo($currentPath, PATHINFO_EXTENSION);
//    echo $extension . PHP_EOL;

    $targetPath = str_replace('mvc.su', '', $pageData[0]);


    if ($extension == 'html') {
        $targetPath .= '/index.' . $extension;
        echo PHP_EOL . $targetPath;

        $file = file_get_contents(__DIR__ . '/old/' . $currentPath);

        $localPath = __DIR__ . '/new/' . $targetPath;

        $localDir = pathinfo($localPath, PATHINFO_DIRNAME);

        if (!is_dir($localDir)) {
            mkdir($localDir, 0777, true);
        }

        if (file_put_contents($localPath, $file)) echo ' OK';

    }


//    break;
}