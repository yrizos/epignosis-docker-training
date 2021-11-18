<?php

$dsn = 'mysql:host=database';
$user = 'root';
$password = '1234';

$dbh = new PDO($dsn, $user, $password);

$statement = $dbh->query('SELECT VERSION();');

$result = $statement->fetch();

echo '<hr>';
echo 'Your MariaDB version is ' . $result['VERSION()'] . '<br>';
echo 'Your PHP version is ' . phpversion() . '<br>';
echo '<hr>';
