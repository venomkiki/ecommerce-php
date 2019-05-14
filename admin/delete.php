<?php
session_start();
if(!isset($_SESSION["adminstrator"]))
{
    ?> <script type="text/javascript">
    window.location.href="adminlogin.php";
</script>
    <?php
}

include "connect.php";
$id = $_GET["id"];

$res = mysqli_query($link, "select * from product where id='$id'");
while($row = mysqli_fetch_array($res))
{
    $img =$row["productimage"];
}

unlink($img);

mysqli_query($link, "delete from product where id='$id'");

?>
<script type="text/javascript">
    window.location = "displayitem.php";
</script>
<?php
?>