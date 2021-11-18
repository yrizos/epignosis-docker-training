<?php

$dsn = 'mysql:host=172.17.0.2';
$user = 'root';
$password = '1234';

$dbh = new PDO($dsn, $user, $password);

$statement = $dbh->query('SELECT VERSION();');

$result = $statement->fetch();

echo '----------------------------------------------------------' . PHP_EOL;
echo 'Your MariaDB version is ' . $result['VERSION()'] . PHP_EOL;
echo 'Your PHP version is ' . phpversion() . PHP_EOL;
echo '----------------------------------------------------------' . PHP_EOL;
