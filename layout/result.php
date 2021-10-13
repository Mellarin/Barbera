
<?php

 $username = $_POST['username'];
 $mail = $_POST['email'];
 $password1 = $_POST['password'];
 $password2 = $_POST['cpassword'];
 $ideal_password = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

 if(empty($username))
 {
     $username_error='Name cannot be null;';
 }
 if(empty($mail))
 {
     $mail_error='Email cannot be null';
 }
 if(empty($password1))
 {
     $password1_error='Email cannot be null';
     
 }else if(preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/',$password1))
 {
    $password1_error="Password isn't strong enough";
 }
 if(empty($password2))
 {
     $password2_error='Email cannot be null';
 }
 

     


?>