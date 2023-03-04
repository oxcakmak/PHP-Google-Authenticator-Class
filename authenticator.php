<?php
include('classes/google-authenticator/base32.php');
$b32 = new Base32;

include('classes/google-authenticator/googleauth.php');
$ga = new GoogleAuth();

/* GENERATE AUTH SHORTCUT */
function gaCode($str, $secret = NULL){
    global $ga, $user;
    if(isset($_SESSION['session'])){
        $secret = $user['googleSecret'];
    }
    return 'otpauth://totp/'.$str.'?secret='.$secret;
}

/* VERIFY AUTH CODE */
function gaVerify($code, $secret = NULL){
    global $ga, $user;
    if(isset($_SESSION['session'])){
        $secret = $user['googleSecret'];
    }
    return (($ga->checkCode($secret, $code))?true:false);
}


?>
