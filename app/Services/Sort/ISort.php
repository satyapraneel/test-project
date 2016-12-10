<?php
/**
 * @File Sort.php
 * @author Satyapraneel <satypraneel.holla@gmail.com>
 * @since 10-Dec-16
 */

namespace App\Services\Sort;



Interface ISort{

	public function getSortedResult($data,$sortOrder);
}