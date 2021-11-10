<?php
function  print_p($log)
{
  return print( "<pre>" . print_r($log, true) . "</pre>");
}

spl_autoload_register(function (string $class): void {
    $str = str_replace('\\', '/', $class);
    $class_path = "lib/classes/$str.php";
    if(file_exists($class_path)) {
        require $class_path;
    }
});

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    exit();
}