<?php
if($_SESSION['user'])
{
	header('Location:/index.php?action=profile');
}
?>
<section class="register">

    <div class="container">

    <form action="/index.php?action=signin" method="POST" class="login-email">

            <p class="login-text" style="font-size: 7rem; font-weight: 900;">Login</p>
            <?php if($_SESSION['failure_message']){
                echo '<p class="login-text" style="font-size: 7rem; font-weight:900;">123</p>';
            }
            unset($_SESSION['failure_message']);
            ?>

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
				<button name="submit" class="btn" type="submit">Login</button>
			 </div>
			<p class="login-register-text">Don't have an account? <a href="index.php?action=registration">Register here</a>.</p>
		</form>	
    </div>
</section>