<?php

declare(strict_types=1);

use Core\Database\Connector;
use Core\Session\Session;

/** @var Session $session */
$session = container(Session::class);

$validator = new \Core\Validation\Validator([
    'name' => ['required', 'max:100'],
    'email' => ['required', 'email', 'max:100'],
    'source' => ['required'],
    'message' => ['required', 'max:255'],
], $_POST);

if ($validator->fails()) {
    $session
        ->withErrors($validator->getErrors())
        ->withInput($_POST);

    redirect('/contact');
}

/** @var Connector $db */
$db = container(Connector::class);

$id = $db
    ->query('INSERT INTO messages (name, email, source, message) VALUES (:name, :email, :source, :message)', $_POST)
    ->insert();

$type = 'success';
$message = 'Your message as been send successfully.';

if (!$id) {
    $type = 'danger';
    $message = 'An error ocurred while sending your message.';
}

$session->flash($type, $message);
redirect('/contact');
