<?php
session_start();
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
?>
<section class="register">

    <div class="container">

    <form action="" method="POST" class="login-email">

            <p class="login-text" style="font-size: 7rem; font-weight: 900;">Login</p>

            <div class="input-group">

				<input type="text" placeholder="Username" name="username" value="" required>

				<?php if(isset($error1))

				{

					echo $error1;

				}

				?>

             </div>

                <div class="input-group">

				<input type="password" placeholder="Password" name="password" value="" required>

				<?php if(isset($error2))

				{

					echo $error2;

				}

				?>

                </div>

			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			 </div>
			<p class="login-register-text">Don't have an account? <a href="index.php?action=register">Register here</a>.</p>
		</form>	
    </div>
	<?php
	if($stmt = $link->prepare('SELECT id, password FROM users WHERE username = ?')){
		$stmt ->bind_param('s',$_POST['username']);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows >0){
			$stmt->bind_result($id,$passwordd);
			$stmt->fetch();
			if(password_verify($_POST['password'],$passwordd)){
			   session_regenerate_id();
			   $_SESSION['loggedin'] = TRUE;
			   $_SESSION['name']=$_POST['username'];
			   $_SESSION['ID']=$id;
			   header('Location:index.php');
			} else {
				$erro1='Incorrect username';
			}

		}else {
			$erro2='Incorrect password';
		}
	}
	?>

</section>