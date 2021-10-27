<?php
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
if(isset($_POST['submit']))
{
	if(preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/',$_POST['password']))
	{
	}else{
		$error1="BAD PASSWORD";
        $temp1++;
	}
	if(preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$_POST['email']))
	{
       $temp2=1;
	}
	else
	{
		$error2="BAD EMAIL";
       $temp1++;
	}
	if(preg_match('/^[A-Za-z][A-Za-z0-9]{5,20}$/',$_POST['username']))
	{
        $temp3=1;
	}
	else
	{
		$error3="Bad username";
      $temp1++;
	}
	if($_POST['password'] != $_POST['cpassword'])
	{
		$error4 = "Passwords did not match!";
	}
    else
    {
      $temp4=1;
      $temp1++;
    }
	$accountData = json_decode(file_get_contents("./json/countries.json"), true);
}
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
	if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
	$status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Captcha is wrong,enter one more time</span></p>";
	}else{
	$status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#46ab4a;'>Greetings!Сaptcha is correct</span></p>";	
		}
	}
 
?>
<section class="register" id="register">
<div class="container">
		<form action="" method="post" class="login-email">
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
  <?php
  if($temp1==0)
 {
	if ($stmt = $link->prepare('INSERT INTO users (username, email, username_password,country) VALUES (?, ?, ?,?)')) {
		$passwordmy = $_POST['password'];
		$passwordd = password_hash($passwordmy, PASSWORD_BCRYPT);
		$stmt->bind_param('ssss', $_POST['username'],$_POST['email'],$passwordd,$_POST['country']);
		$stmt->execute();
	} else {
		echo 'Could not prepare statement!';
	}
 }
 else
 {
	 
 }
  ?>
</section>

