<?php
echo ini_get('disable_functions');

if (function_exists('shell_exec')) {
    echo "shell_exec is enabled";
} else {
    echo "shell_exec is disabled";
}


?>
