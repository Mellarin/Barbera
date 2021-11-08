<?php
$host_name = 'db5005545224.hosting-data.io';
$database = 'dbs4665228';
$user_name = 'dbu25357';
$password = 'killerwhale_mellarin2021';
$link = new mysqli($host_name, $user_name, $password, $database);
if ($link->connect_error) {
    die('<p>Failed to connect to MySQL: '. $link->connect_error .'</p>');
} else {
    echo '<p>Connection to MySQL server successfully established.</p>';
}