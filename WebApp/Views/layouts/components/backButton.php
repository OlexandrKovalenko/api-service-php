<?php
function backButton($url) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        echo $_SERVER['HTTP_REFERER'];
    } else {
        echo $url;
    }
}
?>