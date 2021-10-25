<?php 
session_start();
$data = $_POST;
if(isset($_POST['submit']))
{
	if(preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/',$_POST['password']))
	{
		
	}else{
		$msg1 =' BAD PASSWORD';
        header('Location:index.php?action=registraion');
        exit;
	}
	if(preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$_POST['email']))
	{

	}
	else
	{
		$_SESSION['messages'] [] ='BAD EMAIL';
        header('Location:index.php?action=registraion');
        exit;
	}
	if(preg_match('/^[A-Za-z][a-z0-9]{5,20}$/',$_POST['username']))
	{

	}
	else
	{
		$_SESSION['messages'] [] =' BAD USERNAME ';
        header('Location:index.php?action=registraion');
        exit;
	}
	if($_POST['password'] != $_POST['cpassword'])
	{
		$_SESSION['messages'] [] ='PASSWORDS MUST MATCH ';
        header('Location:index.php?action=registraion');
        exit;
	}
    if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
        if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0)
        {
            $_SESSION['messages'] [] =' CAPTCHA FAILED! TRY AGAIN!';
            header('Location:index.php?action=registraion');
            exit;
        }
        }

}



  