<?php
if(!$_SESSION['user']){
    header('Location:/index.php?action=login');
}
?>
<section class="profile_page" id="profile_page">

    <h2><?=$_SESSION['user']['username']?> </h2>
    <a><?=$_SESSION['user']['email']?></a>
    <a><?=$_SESSION['user']['phone']?></a>
    <a href="index.php?action=logout">Log out now!</a>

</section>
