<?php
session_start();
$data = $_POST['data'];
try{
    $connect = new PDO('mysql:host=185.27.134.10;dbname=epiz_29966536_barberkadata ', $user, $pass);
}
catch(PDOException $exception) {
    $_SESSION['messages'][] = 'Could not connect to Data'. $exception->getMessage();
    die();
}
$state = $connect->prepare('INSER INTO users(username,email,password,country) VALUES (:username, :email, :password,:country)');
if($state)
{
	$result = $state->execute([
		':username' => $data['username'],
		':email' => $data['email'],
		':password' => $data['password'],
	]);
}
if($result)
{
	$_SESSION['messages'][] = 'Success!';
}
	
?>




<section class="register">
    <div class="container">
    <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 7rem; font-weight: 900;">Login</p>
            <div class="input-group">
				<input type="text" placeholder="Username" name="username" value="" required>
				<?php if(isset($error3))
				{
					echo $error3;
				}
				?>
             </div>
                <div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
				<?php if(isset($error1))
				{
					echo $error1;
				}
				?>
                </div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			 </div>
			<p class="login-register-text">Don't have an account? <a href="index.php">Register here</a>.</p>
		</form>	
    </div>
</section>