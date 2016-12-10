<?php
/**
 * @File MergeSort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\SelectionSort;

use App\Services\Sort\ISort;

class SelectionSort implements ISort{
	public function getSortedResult($data,$sortOrder){
		$data = $this->selectionSort($data);
        if($sortOrder == 'descending'){
            return array_reverse($data);
        }
        return $data;
	}

    private function selectionSort(array $arr) {
        for ($i = 0; $i < count($arr); ++$i) {
            $min = null;
            $minKey = null;
            for($j = $i; $j < count($arr); ++$j) {
                if (null === $min || $arr[$j] < $min) {
                    $minKey = $j;
                    $min = $arr[$j];
                }
            }
            $arr[$minKey] = $arr[$i];
            $arr[$i] = $min;
        }
        return $arr;
    }
}