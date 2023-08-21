<?php

ini_set('display_errorsr', 1);
error_reporting(E_ALL);

function debug($str) {
    echo '<pre>';
    var_dump($str);
    echo '</pre><hr>';
    print_r($str);
    echo '</pre>';
    exit;
}

?>