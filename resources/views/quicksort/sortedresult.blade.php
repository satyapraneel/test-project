<div class="table-responsive">
<table class="table">
    <th>Rank</th>
    <th>|Name</th>
<?php
    $subjectToPick = (array_keys($sortedResults['maxNumberOfSubjects'], max($sortedResults['maxNumberOfSubjects'])));
    if(!empty($sortedResults['subject'][$subjectToPick[0]])):
        foreach($sortedResults['subject'][$subjectToPick[0]] as $subjects):
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
                    foreach($sortedResults['subject'][$subjectToPick[0]] as $subjectIndex => $subjects):
                       if(isset($sortedResults['marks'][$sortedResult][$subjectIndex])):
                           echo "<td>".$sortedResults['marks'][$sortedResult][$subjectIndex]."</td>";
                       else:
                           echo "<td>0</td>";
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