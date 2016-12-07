<?php namespace App\Services;
/**
 * @File Fibonacci.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 06-Dec-16
 */
class Fibonacci{

    private $textToDisplay = "UNOCOIN";

    private $reversedTextToDisplay = "NIOCONU";

    private $previousCharacterToDisplay = '';

    private $f1 = 0;

    private $f2 = 1;

    private $f3 = 0;

    public function createFibonacciSeries($maxNumberOfColumns){
        $this->createUpperSection($maxNumberOfColumns);
        $this->createLowerSection($maxNumberOfColumns - 1);
    }

    private function createUpperSection($maxNumberOfColumns){
        for ($i = 1; $i <= $maxNumberOfColumns;$i = $i+2){

            if($i == 1){
                echo "1";
            }
            else if($i == 3){
                echo '1+2';
            }
            else if($i >= 3){
                $this->createFibonacciString($i);
            }
            $this->spaceBetweenText($maxNumberOfColumns,$i);
            for($j = 1; $j <= $i; $j++) {
                $index = ($j-1) % 7;
                echo $this->textToDisplay[$index];
            }
            echo "<br>\n";
        }
    }


    private function createFibonacciString($numberOfCharacterToDisplay)
    {

        $count = 0;
        $textToDisplay = '';
        while($count < $numberOfCharacterToDisplay){
            if($this->previousCharacterToDisplay != ''){
                $textToDisplay .= $this->previousCharacterToDisplay;
                $this->previousCharacterToDisplay = '';
                if(strlen($textToDisplay) > $numberOfCharacterToDisplay){
                    break;
                }
            }
            $this->f3 = (int)$this->f2 + (int)$this->f1;
            $textToDisplay .= $this->f3 . '+';
            $this->f1 = $this->f2;
            $this->f2 = $this->f3;
            if(strlen($textToDisplay) <= $numberOfCharacterToDisplay){
                $count = strlen($textToDisplay);
            }
            else{
                break;
            }
        }
        $textToBeDisplayed =  substr($textToDisplay, 0, $numberOfCharacterToDisplay);
        $this->previousCharacterToDisplay = ltrim(substr($textToDisplay,$numberOfCharacterToDisplay), '+');
        echo $textToBeDisplayed;
    }

    private function spaceBetweenText($maxNumberOfColumns,$i)
    {
        for($k=0;$k < $maxNumberOfColumns - $i; $k++){
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
    }

    private function createLowerSection($maxNumberOfColumns)
    {
        for ($i = $maxNumberOfColumns; $i > 0;$i = $i-2){
            $this->createFibonacciString($i - 1);
            $this->spaceBetweenText($maxNumberOfColumns,$i);
            $text = '';
            for($j = $i-1; $j > 0; $j--) {
                $index = ($j-1) % 7;
                $text .=  $this->textToDisplay[$index];
            }
            echo strrev($text);
            echo "<br>\n";
        }
    }

}