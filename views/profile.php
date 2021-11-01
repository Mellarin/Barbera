<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header('');
    exit;
}
$host_name = 'db5005545224.hosting-data.io';
$database = 'dbs4665228';
$user_name = 'dbu25357';
$password = 'ALEXLEO2002';
$link = new mysqli($host_name, $user_name, $password, $database);
$temp1=0;
if ($link->connect_error) {
  die('<p>Failed to connect to MySQL: '. $link->connect_error .'</p>');
} else {
  echo '<p>Connection to MySQL server successfully established.</p>';
}
$stmt = $link->prepare('SELECT password, email FROM users WHERE ID = ?');
$stmt->bind_param('i', $_SESSION['ID']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
?>
<section class="profile-page">
<div class content>
    <h2>Profile</h2>
    <td>Username</td>
    <td><?=$_SESSION['username']?></td>
    <td>Email</td>
    <td><?=$_SESSION['email']?></td>
</div>
</section>