<?php

include 'header.php';
include 'sidemenu.php';
include "connect.php";
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Display Orders</h2>
        <div class="block">
            <?php


           $res = mysqli_query($link, "select * from confirm_order_address order by id desc");
           echo "<table class='data display datatable' border='1' >";
           echo   "<tr>";
           echo   "<th>"; echo "firstname"; echo "</th>";
           echo   "<th>"; echo "lastname"; echo "</th>";
           echo   "<th>"; echo "email";   echo "</th>";
           echo   "<th>"; echo "address"; echo "</th>";
           echo   "<th>"; echo "city"; echo "</th>";
           echo   "<th>"; echo "pincode"; echo "</th>";
           echo   "<th>"; echo "contact no"; echo "</th>";
            echo   "<th>"; echo "view order"; echo "</th>";
           echo  "</tr>";
           while($row =  mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td align='center'>";    echo $row["firstname"];  echo "</td>";
                echo "<td align='center'>";    echo $row["lastname"];  echo "</td>";
                echo "<td align='center'>";    echo $row["email"];  echo "</td>";
                echo "<td align='center'>";    echo $row["address"];  echo "</td>";
                echo "<td align='center'>";    echo $row["city"];  echo "</td>";
                echo "<td align='center'>";    echo $row["pincode"];  echo "</td>";
                echo "<td align='center'>";    echo $row["contactno"];  echo "</td>";
                echo "<td align='center'>";   ?> <a href="vieworder.php?id=<?php  echo $row["id"]; ?>" >view order</a>  <?php  echo "</td>";

                echo "<tr>";

           }
           echo "</table>";
           ?>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>



