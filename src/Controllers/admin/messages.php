<?php

declare(strict_types=1);

use Core\Database\Connector;

$db = container(Connector::class);

$title  = 'My Messages';
$heading = $title;

$messages = $db
    ->query('SELECT * FROM messages')
    ->get();

require resource_path('views/admin/messages.php');
