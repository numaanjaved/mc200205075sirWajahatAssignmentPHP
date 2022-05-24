<?php

$query = 'INSERT INTO users_level(name) VALUES (?)';

$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $name);

$name = 'costumer';

$stmt->execute();

$name = 'pharmacist';

$stmt->execute();

$name = 'admin';

$stmt->execute();

unset($query, $name, $stmt);