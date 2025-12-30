<?php
// stream.php
$server = "http://78.129.241.110";
$port   = "26876";
$mount  = "/;"; // Ponto e vírgula importante para Shoutcast

header('Content-Type: audio/mpeg');
header('Cache-Control: no-cache');

$stream = fopen($server . ":" . $port . $mount, "r");

if ($stream) {
    while (!feof($stream)) {
        echo fread($stream, 8192); // Lê o buffer e entrega pro navegador
        flush();
    }
    fclose($stream);
}
?>