<?php

declare(strict_types=1);

use Core\Database\Connector;

$validator = new \Core\Validation\Validator([
    'name' => ['required', 'max:100'],
    'email' => ['required', 'email', 'max:100'],
    'source' => ['required'],
    'message' => ['required', 'max:255'],
], $_POST);

if ($validator->fails()) {
    $_SESSION['errors'] = $validator->getErrors();

    header('Location: /contact');
    exit;
}

/** @var Connector $db */
$db = container(Connector::class);

$db
    ->query('INSERT INTO messages (name, email, source, message) VALUES (:name, :email, :source, :message)', $_POST)
    ->insert();

unset($_SESSION['old']);
header('Location: /contact');
