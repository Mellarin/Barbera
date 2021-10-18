<?php 
if(isset($_POST['submit']))
{
	if(preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/',$_POST['password']))
	{
		
	}else{
		$error1="BAD PASSWORD";
	}
	if(preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$_POST['email']))
	{

	}
	else
	{
		$error2="BAD EMAIL";
	}
	if(preg_match('/^[A-Za-z][a-z0-9]{5,20}$/',$_POST['username']))
	{

	}
	else
	{
		$error3="Bad username";
	}
	if($_POST['password'] != $_POST['cpassword'])
	{
		$error4 = "Passwords did not match!";
	}
	$accountData = json_decode(file_get_contents("./json/countries.json"), true);

}
?>
<script>
	fetch("countries.json")
	.then(response => response.json())
	.then(countries => {
		var template = '';
		for(var country of countries)
		{
			template+=<option value="${country.name}">${country.name}</option>
		}
		const l = document.getElementById('selector')
		l.innerHTML=template;
	}
	)
</script>
<section class="register" id="register">
<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 7rem; font-weight: 900;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="" required>
				<?php if(isset($error3))
				{
					echo $error3;
				}
				?>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
				<?php if(isset($error2))
				{
					echo $error2;
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
				<input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
				<?php if(isset($error4))
				{
					echo $error4;
				}
				?>
			</div>
			<div class="input-group">
				<a class="Chooose" style="font-size:2.5rem">Choose country</a>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<select id='select' style="font-size:2.5rem">
					<option value="countries"></option>
				</select>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
	<?php 
if(isset($error))
{
	echo $error;
}
?>
</section>


