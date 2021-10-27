<?php
define('NAME_DB','alex');
define('USER_DB','alex');
define('PASSWD_DB','12345678');
define('HOST_DB','74.206.166.133');

try{
    $connect = new mysqli(HOST_DB,USER_DB,PASSWD_DB,NAME_DB);
    mysqli_set_charset($connect,'UTF8');

}catch(Exception $excep){
    print "Something wen't wrong!".$excep->getMessage();
}catch(Exception $ex){
    print "System is busy please try again";
}