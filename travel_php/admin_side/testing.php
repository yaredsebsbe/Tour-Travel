<?php
$pass="my name is yared";
$hash=password_hash($pass, PASSWORD_DEFAULT);
echo "hashed password is " . $hash;

$pa="my name is yared";
$dec=password_verify($pa,$hash);
if($dec){
    echo $dec;
}
else{
    echo"sorry";
}