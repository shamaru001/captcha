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
    private $width  = 200;
    private $heigth = 100;
    private $RGBBackgroundColor = [0,100,0];
    private $RGBImageBackground = null;
    private $RGBTextColor = [233,14,91];
    private $textSize = 5;
    private $text = "text on screen";
    private $coordinateX = 0;
    private $coordinateY = 50;
    private $angle = 0;

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

        $this->image = imagecreate($this->width, $this->heigth);
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
        $this->angle = rand(($this->coordinateY/5)*-1,$this->coordinateY/5);
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

    public function setCoordinateX($val){
        $this->coordinateX = (float) $val;
    }

    public function setCoordinateY($val){
        $this->coordinateY = (float) $val;
    }

    public function setAngle($val){
        $this->angle = (float) $val;
    }

    function showImage(){

        $this->drawText();

        //imagettftext($this->image, $this->heigth/2, $this->angle, $this->coordinateX, $this->coordinateY, $text_color, $font_path, $this->getText());
        imagepng($this->image);
    }

    private function drawText(){
        $text_space = (float) $this->width/$this->textSize;
        
        $background_color = imagecolorallocate($this->image, $this->RGBBackgroundColor[0], $this->RGBBackgroundColor[1], $this->RGBBackgroundColor[2]);
        $font_path =  realpath(__DIR__."/fonts/Pacifico.ttf"); 
        $text_color = imagecolorallocate($this->image, $this->RGBTextColor[0], $this->RGBTextColor[1], $this->RGBTextColor[2]);
        $space_x = 0;
        for ($i = 0; $i < $this->textSize; $i++){
            imagettftext($this->image, $this->heigth/2, $this->angle, rand($space_x, $space_x + $text_space/2) , rand($this->coordinateY/0.5,$this->coordinateY), $text_color, $font_path, $this->text[$i]);
            $space_x += $text_space;
        }
        
    }
}

