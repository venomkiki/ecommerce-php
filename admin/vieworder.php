<?php

include 'header.php';
include 'sidemenu.php';
include "connect.php";
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Order</h2>
        <div class="block">
            <?php
            $id = $_GET["id"];
           $res= mysqli_query($link , "select * from confirm_order_product where order_id = '$id'" );
            echo "<table class='data display datatable' border='1'>";
            echo "<tr>";
            echo "<th>"; echo "product image"; echo "</th>";
            echo "<th>"; echo "product name"; echo "</th>";
            echo "<th>"; echo "product price"; echo "</th>";
            echo "<th>"; echo "product qty"; echo "</th>";
            echo "<th>"; echo "product total"; echo "</th>";
            echo  "</tr>";
            while($row = mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td align='center'>";  ?> <img src="../admin/<?php echo $row["productimage"]; ?>" height="100" width="100"/>  <?php  echo "</td>";
                echo "<td align='center'>";    echo $row["productname"];  echo "</td>";
                echo "<td align='center'>";    echo $row["productprice"];  echo "</td>";
                echo "<td align='center'>";    echo $row["productqty"];  echo "</td>";
                echo "<td align='center'>";    echo $row["producttotal"];  echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
            ?>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>



