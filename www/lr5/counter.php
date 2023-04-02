<?php 

function write_dig($filename, $count) {
    if (is_writable($filename)) {

        if (!$handle = fopen($filename, 'w')) {
             echo "Не могу открыть файл ($filename)";
             exit;
        }
        if (fwrite($handle, $count) === FALSE) {
            echo "Не могу произвести запись в файл ($filename)";
            exit;
        }

        fclose($handle);
    } else {
        echo "Файл $filename недоступен для записи";
    }
}

function read_dig($filename) {
    $handle = fopen($filename, "r");
    $count = fread($handle, filesize($filename));
    fclose($handle);
    return $count;
}

function counter() {
    $filename = "files_in_project/counter.txt";
    $count = read_dig($filename);
    $count++;
    write_dig($filename, $count);
    return $count;
}

?>