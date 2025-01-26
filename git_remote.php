<?php

// Secret Token dari GitHub (Opsional)
$secret = 'ikanmasak';

// Ambil payload dari GitHub
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';

// Validasi Signature
if ($secret && $signature) {
    $hash = 'sha1=' . hash_hmac('sha1', $payload, $secret);
    if (!hash_equals($hash, $signature)) {
        http_response_code(403);
        die('Invalid signature');
    }
}

// Jalankan perintah Git
// $output = shell_exec('git config --global --add safe.directory /www/wwwroot/merantiapi.qordinate.com/tes_serv && cd /www/wwwroot/merantiapi.qordinate.com/tes_serv && git pull origin main 2>&1');
$output = shell_exec('git config --global --add safe.directory public_html/gitremote.qordinate.com/git_serv2 && cd public_html/gitremote.qordinate.com/git_serv2 && git pull origin main 2>&1');
// $output = shell_exec('cd /www/wwwroot/merantiapi.qordinate.com/man_serv && git pull origin main 2>&1');
echo "<pre>$output</pre>";
echo json_encode(['status' => 'success', 'message' => 'Git pull executed']);


http_response_code(200);