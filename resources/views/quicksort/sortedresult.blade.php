<div class="table-responsive">
<table class="table">
    <th>Rank</th>
    <th>|Name</th>
<?php
    if(!empty($sortedResults['subject'][0])):
        foreach($sortedResults['subject'][0] as $subjects):
            echo "<th>|$subjects</th>";
        endforeach;
    endif;
    echo "<th>|Total</th>";
    $rank = 1;
    if(!empty($sortedResults['sortedIndex'])):
        foreach($sortedResults['sortedIndex'] as $sortedResult):
            echo "<tr>";
                echo "<td>$rank</td>";
                if(isset($sortedResults['name'][$sortedResult])){
                    echo '<td>'.$sortedResults['name'][$sortedResult].'</td>';
                }
                if(isset($sortedResults['subject'][$sortedResult])):
                    foreach($sortedResults['subject'][$sortedResult] as $subjectIndex => $subjects):
                       if(isset($sortedResults['marks'][$sortedResult][$subjectIndex])):
                           echo "<td>".$sortedResults['marks'][$sortedResult][$subjectIndex]."</td>";
                       endif;
                    endforeach;
                endif;
                echo "<td>".$sortedResults['total'][$sortedResult]."</td>";
            echo "</tr>";
            $rank++;
        endforeach;
    endif;
?>

</table>
</div>