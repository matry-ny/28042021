<?php

require_once __DIR__ . '/../security.php';
require_once __DIR__ . '/../helpers/response.php';

$_SESSION = [];
session_destroy();

redirect('../index.php');
