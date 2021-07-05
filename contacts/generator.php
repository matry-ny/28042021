<?php

require_once __DIR__ . '/configs/main.php';
require_once __DIR__ . '/helpers/strings.php';
require_once __DIR__ . '/components/db.php';

require_once __DIR__ . '/models/UsersModel.php';
generateRandomUsers(100000);

