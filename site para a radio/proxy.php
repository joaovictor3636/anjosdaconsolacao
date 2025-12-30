<?php
// Configuração da Rádio
$server = "http://37.157.242.101";
$port   = "15161";
$path   = "/;"; // O ponto e vírgula é essencial para Shoutcast/Icecast

// Cabeçalhos para enganar o navegador e dizer que é um arquivo de áudio
header('Content-Type: audio/mpeg');
header('Cache-Control: no-cache');
header('Access-Control-Allow-Origin: *');

// Abre o túnel
$stream = fopen($server . ":" . $port . $path, "r");

// Repassa os dados (Buffer)
if ($stream) {
    while (!feof($stream)) {
        echo fread($stream, 8192);
        flush();
    }
    fclose($stream);
}
?>