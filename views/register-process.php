<?php
$host_name = 'db5005545224.hosting-data.io';
$database = 'dbs4665228';
$user_name = 'dbu25357';
$password = '<Zeroty_2021_ALEX>';

$link = new mysqli($host_name, $user_name, $password, $database);

if ($link->connect_error) {
  die('<p>Failed to connect to MySQL: '. $link->connect_error .'</p>');
} else {
  echo '<p>Connection to MySQL server successfully established.</p>';
}

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Please complete the registration form');
}

if($command = $link->prepare('INSERT INTO users (username, email, username_password,country) VALUES (?, ?, ?,?)')){
    $password_hashed = $password_hash($_POST['password'],PASSWORD_BCRYPT);
    $command->bind_param('ssss',$_POST['username'],$_POST['email'],$password_hashed);
    $command->execute();
    echo 'You successfully registered!';
} else {
    echo 'Somethins went wrong!';
}
?>
