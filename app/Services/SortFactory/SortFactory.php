<?php
/**
 * @File Sort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\SortFactory;

use App\Services\HeapSort\HeapSort;
use App\Services\MergeSort\MergeSort;
use App\Services\QuickSort\QuickSort;
use App\Services\SelectionSort\SelectionSort;


class SortFactory{

	public function getSortType($sortType){
        switch ($sortType) {
            case 'quickSort':
                return new QuickSort;
            case 'mergeSort':
                return new MergeSort;
            case 'selectionSort':
                return new SelectionSort;
            case 'heapSort':
                return new HeapSort;
        }
		return null;
	}
}