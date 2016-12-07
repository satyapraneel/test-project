<?php
/**
 * @File QuickSort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 07-Dec-16
 */

namespace App\Services\QuickSort;


class QuickSort implements IQuickSort{

    public function getSortedResult($studentDetails)
    {
        //find the total for all the totals
        $allTotals = [];
        $sortedStudentDataIndex = [];
        foreach($studentDetails['name'] as $key => $studentDetail){
            $total = 0;
            foreach($studentDetails['marks'][$key] as $marks){
                $total += $marks;
            }
            $allTotals[$key] = $total;
            $studentDetails['index'][$total] = $key;
            $studentDetails['total'][$key] = $total;
        }

        //sort
        $allSortedTotals = $this->quickSort($allTotals);
        foreach($allSortedTotals as $sortedTotal){
            if(isset($studentDetails['index'][$sortedTotal])){
                $sortedStudentDataIndex[] = $studentDetails['index'][$sortedTotal];
            }
        }
        $studentDetails['sortedIndex'] = $sortedStudentDataIndex;
        return $studentDetails;
    }

    private function quickSort( $totalMarks ) {
        if( count( $totalMarks ) < 2 ) {
            return $totalMarks;
        }
        $left = $right = [];
        reset( $totalMarks );
        $pivot_key  = key( $totalMarks );
        $pivot  = array_shift( $totalMarks );
        foreach( $totalMarks as $k => $v ) {
            if( $v < $pivot )
                $left[$k] = $v;
            else
                $right[$k] = $v;
        }
        return array_merge($this->quickSort($left), array($pivot_key => $pivot), $this->quickSort($right));
    }
}