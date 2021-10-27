<?php
require("helper.php");
$error = array();

$username_register = validation_register($_POST['username']);
if(empty($username_register))
{
    $error[] = "Username must be,please enter your username";
}
if(preg_match('/^[A-Za-z][a-z0-9]{5,20}$/',$username_register))
	{

	}
	else
	{
		$error[]="Bad username";
	}
$email_register = validation_register_email($_POST['email']);
if(empty($email_register))
{
    $error[] = "Email can't be null!";
}
if(preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$email_register))
	{

	}
else
	{
		$error[]="BAD EMAIL";
	}

$password_register = validation_register($_POST['password']);
if(empty($password_register))
{
    $error[] = "Password can't be null!";
}
if(preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/',$password_register))
	{
		
	}
else
     {
		$error []="BAD PASSWORD";
   }
$cpassword_register = validation_register($_POST['cpassword']);
if(empty($cpassword_register))
{
    $error[] = "Passwords didn't match";
}
if($password_register!= $password_register)
	{
		$error[] = "Passwords did not match!";
	}
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") )
{
        if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0)
        {
        $error[] = "Captcha does not match!";
        }
        else
        {
        
        }
 }
 $countryuser = $_POST['country'];

 if(empty($error))
 {
     $hidepassword=password_hash($password_register,PASSWORD_BCRYPT);
     require('msql-connect.php');
     $command = "INSERT INTO users(ID,username,email,userpassword,country,dateofregistration)";
     $command .= " VALUES('',?,?,?,?,NOW())";
     
     $temp = mysqli_stmt_init($connect);
     mysqli_stmt_prepare($temp,$command);
     mysqli_stmt_bind_param($temp,'ssss',$username_register,$email_register,$hidepassword,$countryuser);
     mysqli_stmt_execute($temp);
     if(mysqli_stmt_affected_rows($temp)==1)
     {
         print "success!";
     }else{
         print "Error!";
     }
 }
 else
 {
    
 }
