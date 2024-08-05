<?php

declare(strict_types=1);

use Core\Database\Connector;

$title = 'Contact Us';
$heading = $title;
$messageWasSent = false;
$failure = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /** @var Connector $db */
    $db = container(Connector::class);

    $id = $db->query('INSERT INTO messages (name, email, source, message) VALUES (:name, :email, :source, :message)', $_POST)
        ->insert();

    !$id ? $failure = true : $messageWasSent = true;
}

require resource_path('/views/contact.php');
