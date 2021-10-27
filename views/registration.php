<?php 

   if($_SERVER['REQUEST_METHOD']=='POST'){
	   require('register-process.php');
   }
?>
<section class="register" id="register">
<div class="container">
		<form action="register.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 7rem; font-weight: 900;">Register</p>
			<div class="input-group">
				<input type="text" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="Username" name="username" required>
				<?php
					echo $error;
				?>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
				<?php 
				
				echo $error;
				
				?>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
				<?php 
				
				echo $error;
				
				?>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value = " " required>
				<?php
				
					echo $error;
				
				?>
			</div>
			<div class="input-group">
				<a class="Chooose" style="font-size:2.5rem">Choose country</a>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<select id='selector' style="font-size:2.5rem" name='country'>
					<option value="countries"></option>
				</select>
			</div>
			<div class="input-group">
		       <a><img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'></a>
                <a><a href='javascript: refreshCaptcha();'>Refresh</a></a>
				<input type="captcha" placeholder="Captcha" required>		
			</div>
			<div class="input-group">
				<br>
				<br>
				<button name="submit" class="btn">Register</button>
			 </div>
			    <br>
				<br>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
	<?php 
?>
<script>
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
fetch("countries.json")
	.then(response => response.json())
	.then(countries => {
		var template = '';
		for(var country of countries)
		{
			template+=`<option value="${country.name}">${country.name}</option>`
		}
		const l = document.getElementById('selector')
		l.innerHTML=template;
	}
	)
</script>
</section>
