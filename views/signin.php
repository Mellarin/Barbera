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

 $username = $_POST['username'];
 $password = $_POST['password'];
 if($stmt = $link->prepare('SELECT id,username,email,password,phonenumber,country FROM `users` WHERE `username` = ?')){
     $stmt -> bind_param('s',$username);
     $stmt ->execute();
     $stmt->store_result();
     if($stmt->num_rows() > 0){
         $result = $stmt->fetch();
             $_SESSION['user'] = [
                 "id" => $result['id'],
                 "name" => $result['username'],
                 "email" => $result['email'],
                 "phone" => $result['phonenumber'],
                 "country" => $result['country'],
             ];
             header("Location:/index.php?action=profile");
         } else {
         $_SESSION['failure_message'] = '1';
         header('Location:/index.php?action=login');
     }
 }

?>