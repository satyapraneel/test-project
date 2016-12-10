<?php
/**
 * @File MergeSort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\MergeSort;

use App\Services\Sort\ISort;

class MergeSort implements ISort{
	public function getSortedResult($data,$sortOrder){
        $data = $this->mergeSort($data);
        if($sortOrder == 'descending'){
            return array_reverse($data);
        }
		return $data;
	}

    private function mergeSort($data)
    {
        return $this->divide($data);
    }

    private function divide(array $arr) {
        if (1 === count($arr)) {
            return $arr;
        }
        $left = $right = array();
        $middle = round(count($arr)/2);
        for ($i = 0; $i < $middle; ++$i) {
            $left[] = $arr[$i];
        }
        for ($i = $middle; $i < count($arr); ++$i) {
            $right[] = $arr[$i];
        }
        $left = $this->divide($left);
        $right = $this->divide($right);
        return $this->conquer($left, $right);
    }

    private function conquer(array $left, array $right) {
        $result = array();
        while (count($left) > 0 || count($right) > 0) {
            if (count($left) > 0 && count($right) > 0) {
                $firstLeft = current($left);
                $firstRight = current($right);
                if ($firstLeft <= $firstRight) {
                    $result[] = array_shift($left);
                }
                else {
                    $result[] = array_shift($right);
                }
            } else if (count($left) > 0) {
                $result[] = array_shift($left);
            } else if (count($right) > 0) {
                $result[] = array_shift($right);
            }
        }
        return $result;
    }


}