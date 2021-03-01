<?php require "includes.php"; 
 $productObj = new Products;
 $productObj->id = $_GET['product_id'];   
 $rsProduct = $productObj->get_products(); ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="assets/css/user-style.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="super_container">
    <header class="header" style="display: none;">
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">

                    <?php $img = explode(',',$rsProduct[0]->upload_img);
                       // foreach($img as $k => $v){ ?>
                            <li data-image="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[0]; ?>"><img src="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[0]; ?>" alt=""></li>
                            <li data-image="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[1]; ?>"><img src="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[1]; ?>" alt=""></li>
                            <li data-image="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[2]; ?>"><img src="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[2]; ?>" alt=""></li>
                        <?php// } ?>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected"><img src="<?php echo PRODUCT_DIR ?>/uploads/<?php echo $img[0]; ?>" alt=""></div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </nav>
                        <div class="product_name"><?php echo $rsProduct[0]->product_name; ?></div>
                        <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35 Ratings & 45 Reviews</span></div>
                        <div> <span class="product_price"> <?php echo '₹'.$rsProduct[0]->special_price; ?></span> <strike class="product_discount"> <span style='color:black'><?php echo '₹'.$rsProduct[0]->price; ?><span> </strike> </div>
                        <div> <span class="product_saved">You Saved:</span> <span style='color:black'>₹ <?php echo  $rstodal = str_replace(',',$rsProduct[0]->price) - str_replace(',', $rsProduct[0]->special_price); ?><span> </div>
                        <hr class="singleline">
                        <div class="row col-md-12"><?php echo $rsProduct[0]->description; ?></div>

                        <div class="row"> 
                            <div class="col-md-6"><span class="product_info ">EMI starts at ₹ 2,000. No Cost EMI Available<span><br> <span class="product_info">Warranty: 6 months warranty<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">In Stock: 25 units sold this week<span></div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="br-dashed">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-3"> <img src="https://img.icons8.com/color/48/000000/price-tag.png"> </div>
                                            <div class="col-md-9 col-xs-9">
                                                <div class="pr-info"> <span class="break-all">Get 5% instant discount + 10X rewards @ RENTOPC</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7"> </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6" style="margin-left: 15px;"> <span class="product_options">RAM Options</span><br> <button class="btn btn-primary btn-sm">4 GB</button> <button class="btn btn-primary btn-sm">8 GB</button> <button class="btn btn-primary btn-sm">16 GB</button> </div>
                                <div class="col-xs-6" style="margin-left: 55px;"> <span class="product_options">Storage Options</span><br> <button class="btn btn-primary btn-sm">500 GB</button> <button class="btn btn-primary btn-sm">1 TB</button> </div>
                            </div>
                        </div>
                        <hr class="singleline">
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="margin-left: 13px;">
                                <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6"> <button type="button" class="btn btn-primary shop-button">Add to Cart</button> <button type="button" class="btn btn-success shop-button">Buy Now</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
        </div>
    </div>
</div>