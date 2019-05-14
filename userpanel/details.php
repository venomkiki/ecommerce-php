                <?php
                include "details_header.php";
                include "detailssidepanel.php";

                $res = mysqli_query($link, "select * from product where id='$id'");
                while($row = mysqli_fetch_array($res))
                {
                ?>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="../admin/<?php echo $row["productimage"] ?>" alt="" />

                            </div>


                        </div>


                        <form name="form1" action="" method="post">


                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2><?php echo $row["productdescription"] ?></h2>
                                    <p>Web ID: <?php echo $row["id"] ?></p>

                                    <span>
									<span>$<?php echo $row["productprice"] ?></span>
									<label>Quantity</label>
									<input type="text" name="qty1" value="0" />
									<button type="submit" name="submit1" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                                    <p><b></b> In Stock</p>
                                    <p><b>Availability:</b> In Stock</p>
                                    <p><b>Condition:</b> New</p>
                                    <p><b>Brand:</b> Buymore</p>

                                </div><!--/product-information-->
                            </div>
                    </div><!--/product-details-->
                    </form>
                    <?php
                    }
                    ?>

                    <?php
                    include "categorydetails.php";
                    include "recommendeddetails.php";
                    ?>


                </div>
            </div>
        </div>
    </section>
<?php
include "detailsfooter.php";
?>





