<?php
/**
 * @File QuickSort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 07-Dec-16
 */

namespace App\Services\QuickSort;

use App\Services\Sort\ISort;


class QuickSort implements ISort{

    public function getSortedResult($data,$sortOrder){
        $data = $this->quickSort($data);
        if($sortOrder == 'descending'){
            return array_reverse($data);
        }
        return $data;
    }

    private function quickSort( $data) {
        if( count( $data ) < 2 ) {
            return $data;
        }
        $left = $right = [];
        reset( $data );
        $pivot_key  = key( $data );
        $pivot  = array_shift( $data );
        foreach( $data as $k => $v ) {
            if($v < $pivot) {
                    $left[$k] = $v;
            }
            else
                $right[$k] = $v;
        }
        return array_merge($this->quickSort($left), array($pivot_key => $pivot), $this->quickSort($right));
    }
}