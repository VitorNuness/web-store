<?php

declare(strict_types=1);

use Core\Database\Connector;

$title = 'Contact Us';
$heading = $title;
$messageWasSent = false;
$failure = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        $errors['name'][] = 'Name is required.';
    }

    if (strlen($_POST['name']) > 100) {
        $errors['name'][] = 'Name must have a maximum of 100 characters.';
    }

    if (empty($_POST['email'])) {
        $errors['email'][] = 'E-mail is required.';
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'][] = 'Invalid e-mail.';
    }

    if (strlen($_POST['email']) > 100) {
        $errors['email'][] = 'E-mail must have a maximum of 100 characters.';
    }

    if (empty($_POST['source'])) {
        $errors['source'][] = 'Source is required.';
    }

    if (empty($_POST['message'])) {
        $errors['message'][] = 'Message is required.';
    }

    if (strlen($_POST['message']) > 255) {
        $errors['message'][] = 'Message must have a maximum of 255 characters.';
    }

    if (!$errors) {
        /** @var Connector $db */
        $db = container(Connector::class);

        $id = $db->query('INSERT INTO messages (name, email, source, message) VALUES (:name, :email, :source, :message)', $_POST)
            ->insert();

        !$id ? $failure = true : $messageWasSent = true;
    }
}

require view('contact.php');
