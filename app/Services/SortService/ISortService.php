<?php
/**
 * @File ISortService.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\SortService;


interface ISortService {
    public function getSortedResult($data);
}