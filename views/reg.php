<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barberka</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <header>
        <a href="#" class="logo"><span>BARBERKA</span></a>
        <div id="menu" class="menu"></div>
        <nav class="navbar">
            <ul>
                <li><a class="active" href="index.php?action=main">HOME</a></li>
                <li><a href="index.php?action=photo">Photos</a></li>
                <li><a href="index.php?action=about">About us</a></li>
                <li><a href="index.php?action=haircuts">Haircuts</a></li>
                <li><a href="index.php?action=price">Price</a></li>
                <li><a href="index.php?action=registration">Registration</a></li>
            </ul>
        </nav>
    </header>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 4rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
            <label for="country">Choose your Country:</label>
            <select id="sel" onchange="show(this)">
                <option value></option>
            </select>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Already have an account?<a href="index.php">  Login Here</a>.</p>
		</form>
	</div>
    <script src="jquery-2.2.4.min.js"></script>
    <script src="app.js"></script>
</body>
</html>