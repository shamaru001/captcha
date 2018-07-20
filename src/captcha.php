<?php 
namespace shamaru001\captcha;

/**
*  This class is to instance the captcha
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author Shamaru Primera
*/
class captcha{
    private $image = null;
    private $width  = 400;
    private $heigth = 200;
    private $RGBBackgroundColor = [0,100,0];
    private $RGBImageBackground = null;
    private $RGBTextColor = [233,14,91];
    private $textSize = 5;
    private $text = "text on screen";

    public function __construct($textSize = 5, $RandomTextSize = false, $text=""){

        if ($RandomTextSize){
            $this->textSize = rand(1, 10);
        }
        else{
            $this->textSize = $textSize;
        }

        if (!empty($text)){
            $this->text = $text;
        }
        else{
            $textCreator = "";
            while (strlen($textCreator) <= (int) $this->textSize){
                $textCreator .= mt_rand();
            }
            $this->text = substr($textCreator, 0, $this->textSize);
        }

    }

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
    public function setRandomValues(){
        $this->RGBTextColor = [rand(0,255),rand(0,255),rand(0,255)];
        $this->RGBBackgroundColor = [rand(0,255),rand(0,255),rand(0,255)];
    }

    public function setTextColor($red, $green, $blue){
        $this->RGBTextColor = [(int)$red, (int) $green, (int) $blue];
    }

    public function setBackgroundColor($red, $green, $blue){
        $this->RGBBackgroundColor = [(int)$red, (int) $green, (int) $blue];
    }

    public function getText(){
        return $this->text;
    }

    function showImage(){
        $this->image = imagecreate($this->width, $this->heigth);
        $background_color = imagecolorallocate($this->image, $this->RGBBackgroundColor[0], $this->RGBBackgroundColor[1], $this->RGBBackgroundColor[2]);
        $text_color = imagecolorallocate($this->image, $this->RGBTextColor[0], $this->RGBTextColor[1], $this->RGBTextColor[2]);

        $font_path =  realpath(__DIR__."/fonts/Pacifico.ttf");
        //imagestring($this->image, 132, 100, 100,  $this->getText(), $text_color);
        imagettftext($this->image, 50, 0, 0, 100, $text_color, $font_path, $this->getText());

        imagepng($this->image);
    }


}