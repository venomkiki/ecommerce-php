<?php
session_start();
if(!isset($_SESSION["adminstrator"]))
{
    ?> <script type="text/javascript">
    window.location.href="adminlogin.php";
</script>

    <?php
}
?>

<?php
if($_SESSION["editordelete"] == "")
{

}
else
{
include "connect.php";
include "header.php";
include "sidemenu.php";
?>


<div class="grid_10">
    <div class="box round first">
        <h3>Edit and Update product!!</h3>
        <div class="block">
            <?php
            if($_SESSION["editordelete"] == "")
            {
                ?>
                <script type="text/javascript">
                    window.location = "displayitem.php";
                </script>

                <?php
            }
            $id = $_GET["id"];
            $res = mysqli_query($link , "select * from  product where id ='$id'");
            while($row = mysqli_fetch_array($res))
            {
                ?>
                <form name="form1" action="" method="post" enctype="multipart/form-data" >
                    <table class="table table-form data table-responsive" border="1">
                        <tr>
                            <td>Product Current Image</td>
                            <td><img src="../admin/<?php echo $row["productimage"]?>" height="100" width="100"></td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td><input type="text" name="pname"  value="<?php echo $row["productname"];?>" </td>
                        </tr>
                        <tr>
                            <td>Product Price</td>
                            <td><input type="text" name="pprice" value="<?php echo $row["productprice"];?>"  </td>
                        </tr>
                        <tr>
                            <td>Product Quantity</td>
                            <td><input type="text" name="pqty"   value="<?php echo $row["productqty"];?>" </td>
                        </tr>
                        <tr>
                            <td>Product Image</td>

                            <td><input type="file" name="pimage"  </td
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td><select name="cat">
                                    <?php
                                    $res1 = mysqli_query($link, "select DISTINCT productcategory from product");
                                    while($row1=mysqli_fetch_array($res1))
                                    {

                                        ?>
                                        <option><?php echo $row1["productcategory"];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Description</td>
                            <td><textarea cols="22" rows="5" name="pdesc" ><?php echo $row["productdescription"]; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit1" value="Update" class="button-brown" </td>
                        </tr>
                    </table>
                </form>
                <?php
            }

            ?>
            <?php
            if(isset($_POST["submit1"]))
            {
                $filename = $_FILES["pimage"]["name"];

                if($filename == "")
                {
                    mysqli_query($link , "update product set productname='$_POST[pname]' ,productprice='$_POST[pprice]',productqty='$_POST[pprice]',productcategory='$_POST[cat]',productdescription='$_POST[pdesc]' where id='$id' ");
                }
                else
                {
                    $v1 = rand(1111,9999);
                    $v2 = rand(1111,9999);

                    $v3 = $v1.$v2;
                    $v3 = md5($v3);
                    $dst  =  "./productimage/".$v3.$filename;
                    $dst1  =  "productimage/".$v3.$filename;
                    move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
                    mysqli_query($link , "update product set productname='$_POST[pname]' ,productprice='$_POST[pprice]',productqty='$_POST[pprice]',productimage='$dst1',productcategory='$_POST[cat]',productdescription='$_POST[pdesc]' where id='$id' ");

                }
                ?>
                <script type="text/javascript">
                    window.location = "displayitem.php";
                </script>
                <?php
            }

            ?>
        </div>
    </div>
</div>
<?php
include "footer.php";
}
?>

