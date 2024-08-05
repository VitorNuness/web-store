<?php

declare(strict_types=1);

use Core\Database\Connector;

$title = 'Contact Us';
$heading = $title;
$messageWasSent = false;
$failure = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new \Core\Validation\Validator([
        'name' => ['required', 'max:100'],
        'email' => ['required', 'email', 'max:100'],
        'source' => ['required'],
        'message' => ['required', 'max:255'],
    ], $_POST);

    if ($validator->passes()) {
        /** @var Connector $db */
        $db = container(Connector::class);

        $id = $db->query('INSERT INTO messages (name, email, source, message) VALUES (:name, :email, :source, :message)', $_POST)
            ->insert();

        !$id ? $failure = true : $messageWasSent = true;
    } else {
        $errors = $validator->getErrors();
    }
}

require view('contact.php');
