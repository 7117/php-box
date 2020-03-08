<?php

$count = 0;

while (true) {
    $count++;
    if ($count > 10) {
        break;
    }

    $file = __DIR__ . '/file.php';
    $handle = fopen($file, 'a+');
    $res = fwrite($handle, $count . PHP_EOL);
    fclose($handle);
    echo PHP_EOL;

    sleep(5);

}

