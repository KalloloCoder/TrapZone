<?php
// Fungsi logging
function log_data($source, $data) {
    $log = "[" . date('Y-m-d H:i:s') . "] [$source] " . json_encode($data) . PHP_EOL;
    file_put_contents(LOG_FILE, $log, FILE_APPEND);
}
