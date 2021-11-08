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

$username_form=$_POST['username'];
$email_form = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
$password_confirm = password_hash($_POST['cpassword'],PASSWORD_BCRYPT);
$number = $_POST['number'];
$country = $_POST['country'];
if($_POST['password']==$_POST['cpassword']) {
    if ($stmt = $link->prepare('INSERT INTO users (username, email, password, phonenumber, country) VALUES (?,?,?,?,?)')) {
        $stmt->bind_param('sssss',$username_form, $email_form, $password, $number, $country);
        $stmt->execute();
        $_SESSION['success_message']='Registration successful!';
        header('Location:index.php?action=login');
    } else {
        echo 'Could not prepare statement!';
    }

} else {
    $_SESSION['msg'] = 'Passwords did not match';
    header('Location:index.php?action=registration');
}