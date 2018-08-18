<?php
namespace shamaru001\example;
require(__DIR__."/../src/captcha.php");

use shamaru001\captcha\captcha;


$captcha = new captcha;

//ssion_start();
header("Content-type: image/png");

$captcha = new captcha(5, false);
//$_SESSION['captcha'] = $captcha->getText();
$captcha->setRandomValues();
$captcha->showImage();


?>

