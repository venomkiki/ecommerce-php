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
include 'connect.php';
?>

    <div class="grid_10">
        <div class="box round first">
            <h2>
                Add Product</h2>
            <div class="block">
                <form name="form1" action="" method="post" enctype="multipart/form-data" >
                    <table  >
                        <tr>
                            <td>Product Name</td>
                            <td><input type="text" name="pname"  </td>
                        </tr>
                        <tr>
                            <td>Product Price</td>
                            <td><input type="text" name="pprice"  </td>
                        </tr>
                        <tr>
                            <td>Product Quantity</td>
                            <td><input type="text" name="pqty"  </td>
                        </tr>
                        <tr>
                            <td>Product Image</td>
                            <td><input type="file" name="pimage"  </td>
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td><select name="cat">
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Description</td>
                            <td><textarea cols="22" rows="5" name="pdesc">

                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit1" value="AddProduct" class="button-brown" </td>
                        </tr>
                    </table>
                </form>

                <?php
                if(isset($_POST["submit1"]))
                {
                    $v1 = rand(1111,9999);
                    $v2 = rand(1111,9999);

                    $v3 = $v1.$v2;
                    $v3 = md5($v3);

                   $filename = $_FILES["pimage"]["name"];
                   $dst  =  "./productimage/".$v3.$filename;
                   $dst1  =  "productimage/".$v3.$filename;
                   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

                     $res = mysqli_query($link , "insert into product values('','$_POST[pname]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[cat]','$_POST[pdesc]')");
                }
                ?>
            </div>
        </div>
    </div>
<?php
include 'footer.php';
?>



<?php
/**
 * Created by PhpStorm.
 * User: venom
 * Date: 05/03/2019
 * Time: 13:15
 */