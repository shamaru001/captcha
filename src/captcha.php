<?php namespace shamaru001\captcha;

/**
*  This class is to instance the captcha
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author Shamaru Primera
*/
class captcha{

    /**
    * Sample method 
    *
    * Always create a corresponding docblock for each method, describing what it is for,
    * this helps the phpdocumentator to properly generator the documentation
    *
    * @param string $param1 A string containing the parameter, do this for each parameter to the function, make sure to make it descriptive
    *
    * @return string
    */
    private function createImage($width = 100, $heigth=40, array $RGBBackground = [0,0,0], array $RGBTextColor = [233,14,91] ){
        $im = imagecreate(110, 20);
        $background_color = imagecolorallocate($im, $RGBBackground[0], $RGBBackground[1], $RGBBackground[2]);
        $text_color = imagecolorallocate($im, 233, 14, 91);
        imagestring($im, 1, 5, 5,  "A Simple Text String", $text_color);
        return imagepng($im);
    }
}

$captcha = new shamaru001\captcha\captcha;