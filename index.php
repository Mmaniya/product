<?php require "includes.php"; 
 $productObj = new Products;
 $rsProduct = $productObj->get_products();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="assets/css/user-style.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />



<div class="container">
    <h3 class="h3">Product List</h3>
    <div class="row">
        <?php foreach($rsProduct as $key => $value){ ?>
        <div class="col-sm-12 col-md-3 ">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">

                    <a href="#">
                       <?php $img = explode(',',$value->upload_img);
                       // foreach($img as $k => $v){ ?>
                            <img class="pic-1" src="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[0]; ?>">
                            <img class="pic-2" src="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[1]; ?>">
                        <?php// } ?>
                    </a>


                    <ul class="social">
                        <li><a href="single-product.php?product_id=<?php echo $value->id; ?>" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">-10%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?php echo $value->product_name; ?></a></h3>
                    <div class="price">
                    <?php echo '₹'.$value->special_price; ?>
                        <span><?php echo '₹'.$value->price; ?></span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="col-sm-12 col-md-3 ">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-3.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-4.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-discount-label">-12%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Blue Shirt</a></h3>
                    <div class="price">
                        $17.60
                        <span>$20.00</span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 ">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-5.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-6.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">-10%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Black Top</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 ">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-7.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-8.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">-10%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Black Top</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div> -->
    </div>
</div>
<hr>

<!-- <div class="container">
    <h3 class="h3">shopping Demo-8 </h3>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-1.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-2.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                        <li><a href="" class="fa fa-shopping-bag"></a></li>
                        <li><a href="" class="fa fa-shopping-cart"></a></li>
                    </ul>
                    <span class="product-discount-label">-20%</span>
                </div>
                <div class="product-content">
                    <div class="price">£ 8.00
                        <span>£ 10.00</span>
                    </div>
                    <span class="product-shipping">Free Shipping</span>
                    <h3 class="title"><a href="#">Women's Plain Top</a></h3>
                    <a class="all-deals" href="">See all deals <i class="fa fa-angle-right icon"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-3.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-4.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                        <li><a href="" class="fa fa-shopping-bag"></a></li>
                        <li><a href="" class="fa fa-shopping-cart"></a></li>
                    </ul>
                    <span class="product-discount-label">-30%</span>
                </div>
                <div class="product-content">
                    <div class="price">£ 7.00
                        <span>£ 10.00</span>
                    </div>
                    <span class="product-shipping">Free Shipping</span>
                    <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                    <a class="all-deals" href="">See all deals <i class="fa fa-angle-right icon"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-5.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo7/images/img-6.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                        <li><a href="" class="fa fa-shopping-bag"></a></li>
                        <li><a href="" class="fa fa-shopping-cart"></a></li>
                    </ul>
                    <span class="product-discount-label">-20%</span>
                </div>
                <div class="product-content">
                    <div class="price">£ 8.00
                        <span>£ 10.00</span>
                    </div>
                    <span class="product-shipping">Free Shipping</span>
                    <h3 class="title"><a href="#">Women's Plain Top</a></h3>
                    <a class="all-deals" href="">See all deals <i class="fa fa-angle-right icon"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr> -->
