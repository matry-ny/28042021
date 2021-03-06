<?php

require __DIR__ . '/configs/main.php';

require_once __DIR__ . '/helpers/strings.php';
require_once __DIR__ . '/helpers/response.php';
require_once __DIR__ . '/helpers/request.php';

require_once __DIR__ . '/components/db.php';
require_once __DIR__ . '/components/template.php';
require_once __DIR__ . '/components/model.php';
require_once __DIR__ . '/components/loader.php';
require_once __DIR__ . '/components/security.php';

load($_SERVER['REQUEST_URI']);