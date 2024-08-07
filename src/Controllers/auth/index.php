<?php

declare(strict_types=1);

use Core\Session\Session;

$title = 'Admin Login';

$error = container(Session::class)->getFlash('danger');

require view('auth/index.php');
