<?php namespace App\Services\Fibonacci;
/**
 * @File Fibonacci.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 06-Dec-16
 */
class Fibonacci implements IFibonacci{

    private $textToDisplay = "UNOCOIN";

    //Hold the previous string if fibonacci string exceed more than required for loop
    private $previousCharacterToDisplay = '';

    private $f1 = 1;

    private $f2 = 2;

    //f3 contains the sum of f1 and f2
    private $f3 = 0;


    /**
     * @param $maxNumberOfCharacterToDisplay
     * @return string
     */
    public function createFibonacciSeries($maxNumberOfCharacterToDisplay){
        $string = $this->createUpperPortionOfDiamond($maxNumberOfCharacterToDisplay);
        $string .= $this->createLowerPortionOfDiamond($maxNumberOfCharacterToDisplay - 1);
        return $string;
    }

    /*
    */
    /**
     * @param $numberOfCharacterToDisplay
     * creates the Top part of the Fibonacci series when the screen divided horizontally
     *  Ex:  a
     *      abc
     *     abcde
     * @return string
     */
    private function createUpperPortionOfDiamond($numberOfCharacterToDisplay){
        $content = '';
        //Loop the rows till the $numberOfCharacterToDisplay is reached
        for ($charactersInASingleRow = 1; $charactersInASingleRow <= $numberOfCharacterToDisplay;$charactersInASingleRow = $charactersInASingleRow+2){
            //To create a fibonacci string for single row
            $content .= $this->createFibonacciString($charactersInASingleRow);

            //To give the space between Text and fibonacci string
            $content .= $this->spaceBetweenText($numberOfCharacterToDisplay,$charactersInASingleRow + 2);
            //Loop all the characters in the single row
            for($singleCharacter = 1; $singleCharacter <= $charactersInASingleRow; $singleCharacter++) {
                $indexOfTheText = ($singleCharacter-1) % 7;
                //display the single character
                $content .= $this->textToDisplay[$indexOfTheText];
            }
            //give one space between the lines
            $content .= "<br>";
        }
        return $content;
    }

    /**
     * @param $numberOfCharacterToDisplay
     * @return string
     * Creates a fibonacci string for rows.
     */
    private function createFibonacciString($numberOfCharacterToDisplay)
    {
        $content = '';
        //Check whether its a first row
        if($this->f1 == 1 && $numberOfCharacterToDisplay == 1){
            $content .= "1";
        }
        //check whether its a second row
        else if($this->f1 == 1 && $numberOfCharacterToDisplay == 3){
            $content .= '1+2';
        }
        //otherwise
        else {
            $count         = 0;
            //$textToDisplay is the string contains character set which has to be displayed
            $textToDisplay = '';
            //Loop un till the $numberOfCharacterToDisplay is reached
            while ($count < $numberOfCharacterToDisplay) {
                //Check whether previous fibonacci string is empty
                //If not add that to text to display
                if ($this->previousCharacterToDisplay != '') {
                    $textToDisplay .= $this->previousCharacterToDisplay;
                    $this->previousCharacterToDisplay = '';
                    //If previous string length exceeds the $numberOfCharacterToDisplay stop the loop
                    // and display the result
                    if (strlen($textToDisplay) > $numberOfCharacterToDisplay) {
                        break;
                    }
                }
                //f3 contains the sum of f1 and f2
                $this->f3 = (int)$this->f2 + (int)$this->f1;
                $textToDisplay .= $this->f3 . '+';
                $this->f1 = $this->f2;
                $this->f2 = $this->f3;
                //If length of $textToDisplay is less than $numberOfCharacterToDisplay
                //Then increment the count and continue the loop else stop the loop
                if (strlen($textToDisplay) <= $numberOfCharacterToDisplay) {
                    $count = strlen($textToDisplay);
                } else {
                    break;
                }
            }
            //Text to be displayed may contains extra content
            //If so then remove the extra characters and add it to previousCharacterToDisplay
            //So that it will used for the next number
            $textToBeDisplayed                = substr($textToDisplay, 0, $numberOfCharacterToDisplay);
            $this->previousCharacterToDisplay = ltrim(substr($textToDisplay, $numberOfCharacterToDisplay), '+');
            $content .= $textToBeDisplayed;
        }
        return $content;
    }

    //Gives the space between fibonacci string and unocoin text
    private function spaceBetweenText($maxNumberOfCharacterToDisplay,$charactersInASingleRow)
    {
        $content = '';
        //added 5 to make UI look better ($charactersInASingleRow + 5)
        for($addSpace = 0;$addSpace <  $maxNumberOfCharacterToDisplay - $charactersInASingleRow + 5; $addSpace++){
            $content .= " &nbsp; ";
        }
        return $content;
    }

    /* Creates the lower portion of diamond */
    /**
     * @param $numberOfCharacterToDisplay
     * @return string
     * creates the Lower part of the Fibonacci series when the screen divided horizontally
     *  Ex: abcde
     *       abc
     *        a
     */
    private function createLowerPortionOfDiamond($numberOfCharacterToDisplay)
    {
        $content = '';
        //Reversed loop of upper portion starts with one less of $numberOfCharacterToDisplay
        for ($charactersInASingleRow = $numberOfCharacterToDisplay; $charactersInASingleRow > 0;$charactersInASingleRow = $charactersInASingleRow-2){
            $content .= $this->createFibonacciString($charactersInASingleRow - 1);
            $content .= $this->spaceBetweenText($numberOfCharacterToDisplay,$charactersInASingleRow);
            $text = '';
            //Text will hold the reversed string of unocoin
            for($singleCharacter = $charactersInASingleRow-1; $singleCharacter > 0; $singleCharacter--) {
                $index = ($singleCharacter-1) % 7;
                $text .=  $this->textToDisplay[$index];
            }
            $content .= strrev($text);
            $content .= "<br>";
        }
        return $content;
    }

}