<?php

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();
session_destroy();
session_unset();

header("Location:" . $_ENV['ADDRESS'] . '?page=login&logout=success');
exit();