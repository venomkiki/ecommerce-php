<?php
include "header.php";
include "leftpanel.php";
include "connect.php";
?>

    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
<?php
include("pagination/function.php");
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 5; //if you want to dispaly 10 records per page then you have to change here
$startpoint = ($page * $limit) - $limit;
$statement = "product"; //you have to pass your query over here
$category = $_GET["category"];
if($category == null && $search1 == null )
{
    $res=mysqli_query($link,"select * from {$statement} LIMIT {$startpoint} , {$limit}");
    while($row = mysqli_fetch_array($res))
    {
        ?>

        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="../admin/<?php echo $row["productimage"]; ?>" width="255" height="350" alt="" />
                        <h2>$<?php echo $row["productprice"]; ?></h2>
                        <p><?php echo $row["productdescription"]; ?></p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$<?php echo $row["productprice"]; ?></h2>
                            <p><?php echo $row["productdescription"]; ?></p>
                            <a href="details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
}
else if(isset($_POST["submit1"]))
{

        $res1 = mysqli_query($link , "select * from {$statement} where productname like ('%$_POST[search1]%') LIMIT {$startpoint} , {$limit}");
        while($row1 = mysqli_fetch_array($res1))
        {
            ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="../admin/<?php echo $row1["productimage"]; ?>" width="255" height="350" alt="" />
                            <h2>$<?php echo $row1["productprice"]; ?></h2>
                            <p><?php echo $row1["productdescription"]; ?></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>$<?php echo $row1["productprice"]; ?></h2>
                                <p><?php echo $row1["productdescription"]; ?></p>
                                <a href="details.php?id=<?php echo $row1["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }



}

else if($category != null && $search1 == null)
{
    $res2 = mysqli_query($link, "select * from {$statement} where productcategory = '$category' LIMIT {$startpoint} , {$limit} ");
    while($row2 = mysqli_fetch_array($res2))
    {
        ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="../admin/<?php echo $row2["productimage"]; ?>" width="255" height="350" alt="" />
                        <h2>$<?php echo $row2["productprice"]; ?></h2>
                        <p><?php echo $row2["productdescription"]; ?></p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$<?php echo $row2["productprice"]; ?></h2>
                            <p><?php echo $row2["productdescription"]; ?></p>
                            <a href="details.php?id=<?php echo $row2["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
}


?>
    </div>

    <ul class="pagination">
        <?php
        echo pagination($statement,$limit,$page);
        ?>
    </ul>
    </div><!--features_items-->
    </div>
    </div>
    </div>
</section>
<?php
include 'footer.php';
?>