<?php
/**
 * @File SortService.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\SortService;

use App\Services\SortFactory\SortFactory;

class SortService implements ISortService{
	
	private $sortFactory;

	private $algorithmToSort;
	function __construct(SortFactory $sortFactory){
		$this->sortFactory = $sortFactory;

	}
	public function getSortedResult($studentDetails){
        if(!session('subjects')){
            return null;
        }
        $subjects = session('subjects');
        if(isset($studentDetails['algorithmToSort'])){
			$this->algorithmToSort = $this->sortFactory->getSortType($studentDetails['algorithmToSort']);
			if($this->algorithmToSort){
                $sortField = [];
                $indexOfStudentBeforeSort = [];
                foreach($studentDetails['name'] as $studentIndex => $studentDetail){
                    $totalMarks = 0;
                    foreach($subjects as $subject){
                        $totalMarks += $studentDetails['marks'][$studentIndex][$subject];
                        if($studentDetails['sortField'] == $subject) {
                            $sortField[$subject][] = $studentDetails['marks'][$studentIndex][$subject];
                            $indexOfStudentBeforeSort[$studentDetails['marks'][$studentIndex][$subject]]  = $studentIndex;
                        }
                    }
                    if($studentDetails['sortField'] == 'total') {
                        $sortField['total'][] = $totalMarks;
                        $indexOfStudentBeforeSort[$totalMarks] = $studentIndex;
                    }
                    $studentDetails['total'][$studentIndex] = $totalMarks;
                }
                $studentDetails['indexOfStudent'] = $indexOfStudentBeforeSort;
				$studentDetails['sortResult'] = $this->algorithmToSort->getSortedResult($sortField[$studentDetails['sortField']],$studentDetails['sortOrder']);
                return $studentDetails;
            }
		}
        return null;
	}
}