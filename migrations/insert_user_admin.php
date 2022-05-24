<?php

$query = 'INSERT INTO users(username, password, level, status) VALUES (?, ?, ?, ?)';

$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssii', $username, $password, $level, $status);

$username = 'admin@gmail.com';
$password = password_hash('admin123', PASSWORD_DEFAULT);
$level = 3;
$status = 1;

$stmt->execute();

unset($query, $username, $password, $level, $status, $stmt);