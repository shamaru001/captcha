<?php
namespace shamaru001\example;
require(__DIR__."/../src/captcha.php");

use shamaru001\captcha\captcha;


$captcha = new captcha;

//ssion_start();
header("Content-type: image/png");

$captcha = new captcha(5);
/* you can use session to storage text of image */
//$_SESSION['captcha'] = $captcha->getText();
$captcha->setRandomValues();
$captcha->setWidth(400);
$captcha->setHeigth(400);
$captcha->setCoordinateX(1000);
$captcha->setCoordinateY(100);
$captcha->setAngle(90);
$captcha->showImage();


?>

