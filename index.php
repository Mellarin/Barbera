<?php

require_once("./layout/header.php");
 if(isset($_GET["action"]) && file_exists(dirname(__FILE__).'/views/'.$_GET["action"].'.php'))
 {
    require_once(dirname(__FILE__).'/views/'.$_GET["action"].'.php');
 }
else
 {
    require_once("./views/error.php");
 }
 require_once("./layout/footer.php");

?>
