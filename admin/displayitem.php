<?php
session_start();
if(!isset($_SESSION["adminstrator"]))
{
    ?> <script type="text/javascript">
    window.location.href="adminlogin.php";
</script>

    <?php
}


include 'header.php';
include 'sidemenu.php';
include "connect.php";
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Display items</h2>
        <table class="block">
            <?php $res = mysqli_query($link , "select * from product");
            echo "<table class='data display datatable' border='1'>";
            echo "<tr>";
            echo "<th>"; echo "product image"; echo "</th>";
            echo "<th>"; echo "product name"; echo "</th>";
            echo "<th>"; echo "product price"; echo "</th>";
            echo "<th>"; echo "product qty"; echo "</th>";
            echo "<th>"; echo "product category"; echo "</th>";
            echo "<th>"; echo "product desription"; echo "</th>";
            echo "<th>"; echo "edit"; echo "</th>";
            echo "<th>"; echo "delete"; echo "</th>";
            echo  "</tr>";
            while($row = mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td align='center'>";  ?> <img src="../admin/<?php echo $row["productimage"]; ?>" height="100" width="100"/>  <?php  echo "</td>";
                echo "<td align='center'>";    echo $row["productname"];  echo "</td>";
                echo "<td align='center'>";    echo $row["productprice"];  echo "</td>";
                echo "<td align='center'>";    echo $row["productqty"];  echo "</td>";
                echo "<td align='center'>";    echo $row["productcategory"];  echo "</td>";
                echo "<td align='center'>";    echo $row["productdescription"];  echo "</td>";
                echo "<td align='center'>";    ?> <a href="edit.php?id=<?php echo $row["id"]; ?>">edit</a>   <?php  echo "</td>";
                echo "<td align='center'>";    ?> <a href="delete.php?id=<?php echo $row["id"]; ?>">delete</a>   <?php   echo "</td>";
                $_SESSION["editordelete"] = $row["id"];
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



