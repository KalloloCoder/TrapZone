<?php
// Config TrapZone
define('LOG_FILE', __DIR__ . '/../logs/trapzone.log');

// Pastikan log file ada
if (!file_exists(LOG_FILE)) {
    file_put_contents(LOG_FILE, "=== TrapZone Log Started " . date('Y-m-d H:i:s') . " ===\n");
}
