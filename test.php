<?php
require_once __DIR__ . '/vendor/autoload.php';

use Calendar\Date;

$day = (int)$_GET['day'];
echo json_encode(Date::today($day));