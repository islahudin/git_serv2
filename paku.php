<?php
echo ini_get('disable_functions');

if (function_exists('shell_exec')) {
    echo "shell_exec is enabled";
} else {
    echo "shell_exec is disabled";
}

$output = shell_exec('whoami'); // Periksa user yang digunakan
// file_put_contents('/path/to/logs/user_check.log', $output);
file_put_contents('/home/n1577716/public_html/logs/user_check.log', $output);

?>
<!-- cd /public_html/gitremote.qordinate.com/git_serv2 && git pull origin main -->
