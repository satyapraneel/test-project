<?php
/**
 * @File IFibonacci.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 07-Dec-16
 */

namespace App\Services\Fibonacci;


interface IFibonacci {
    public  function createFibonacciSeries($maxNumberOfCharacterToDisplay);
}