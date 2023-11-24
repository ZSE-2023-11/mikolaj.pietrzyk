<?php
echo "<table border =\"1\" style='border-style: double '>";
    for ($a=1; $a <= 2; $a++) {

        echo "<tr> \n";
        for ($x=1; $x <= 10; $x++) {
           $p = $x + $a;
           echo "<td>$p</td> \n";
            }
            echo "</tr>";
        }
    echo "</table>";
?>