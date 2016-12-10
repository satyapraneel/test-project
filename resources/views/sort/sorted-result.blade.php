<hr/>
<table class="table">
<?php
if(!empty($studentDetails) && session('subjects')):
    $subjects  = session('subjects');
    echo "<th>Name</th>";
    foreach($subjects as $subject):
        echo "<th>$subject</th>";
    endforeach;
    echo "<th>Total</th>";
    foreach($studentDetails['sortResult'] as $sortedResult):
            echo "<tr>";
            if(isset($studentDetails['indexOfStudent'][$sortedResult])):
                $indexOfStudent = $studentDetails['indexOfStudent'][$sortedResult];
                echo '<td>'.$studentDetails['name'][$indexOfStudent].'</td>';
                foreach($subjects as $subject):
                    echo '<td>'.$studentDetails['marks'][$indexOfStudent][$subject].'</td>';
                endforeach;
                echo "<td>$sortedResult</td>";
            endif;
            echo "</tr>";
    endforeach;
endif;
?>
</table>