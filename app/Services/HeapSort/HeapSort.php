<?php
/**
 * @File MergeSort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\HeapSort;

use App\Services\Sort\ISort;

class HeapSort implements ISort{
	public function getSortedResult($data,$sortOrder){
		$this->heapSort($data);
        if($sortOrder == 'descending'){
            return array_reverse($data);
        }
        return $data;
	}

    function build_heap(&$array, $i, $t){
        $tmp_var = $array[$i];
        $j = $i * 2 + 1;

        while ($j <= $t)  {
            if($j < $t)
                if($array[$j] < $array[$j + 1]) {
                    $j = $j + 1;
                }
            if($tmp_var < $array[$j]) {
                $array[$i] = $array[$j];
                $i = $j;
                $j = 2 * $i + 1;
            } else {
                $j = $t + 1;
            }
        }
        $array[$i] = $tmp_var;
    }

    private function heapSort(&$array) {
        //This will heapify the array
        $init = (int)floor((count($array) - 1) / 2);
        // Thanks jimHuang for bug report
        for($i=$init; $i >= 0; $i--){
            $count = count($array) - 1;
            $this->build_heap($array, $i, $count);
        }

        //swaping of nodes
        for ($i = (count($array) - 1); $i >= 1; $i--)  {
            $tmp_var = $array[0];
            $array [0] = $array [$i];
            $array [$i] = $tmp_var;
            $this->build_heap($array, 0, $i - 1);
        }
    }
}