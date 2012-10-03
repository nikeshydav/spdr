<?php
require_once('include/recaptchalib.php');
$publickey = "6LcyQ9cSAAAAAM1SCLplMLj16bZDOaTIpImhSyBL"; // you got this from the signup page
$privatekey = "6LcyQ9cSAAAAABju6oTCVeYOpyv5lefDMMi8OMLp";


$recaptcha_challenge_field =  trim($_POST["recaptcha_challenge_field"] );
$recaptcha_response_field = trim ($_POST["recaptcha_response_field"] );

$resp = null;
$error = null;
$captcha_result = 'success';
$resp = recaptcha_check_answer($privatekey,$_SERVER["REMOTE_ADDR"],$recaptcha_challenge_field,$recaptcha_response_field);

/*if ($resp->is_valid)echo "success";
else  die ("The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: ". $resp->error .")");*/

if($resp->error)$captcha_result = 'fail'.$resp->error;
echo $captcha_result;
?>