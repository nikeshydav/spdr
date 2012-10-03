<?php
require_once('include/recaptchalib.php');
$publickey = "6LcyQ9cSAAAAAM1SCLplMLj16bZDOaTIpImhSyBL"; // you got this from the signup page
$privatekey = "6LcyQ9cSAAAAABju6oTCVeYOpyv5lefDMMi8OMLp";
echo recaptcha_get_html($publickey);