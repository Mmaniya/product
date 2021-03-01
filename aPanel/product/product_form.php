<?php 
define('ABSPATH', dirname(__DIR__, 2));
require ABSPATH . "/includes.php";
$action = $_POST['act'];
$productObj = new Products; ?>

<?php if($action == 'add_edit_product'){  
  
  $product_id = $_POST['product_id'];
  $btnName = $title = 'Add New';
  if ($product_id > 0) {
      $productObj->id = $product_id;
      $rsProduct = $productObj->get_products();  
      foreach ($rsProduct[0] as $K => $V) {
          $$K = $V;
      }   
      $btnName = $title = 'Edit ';
  } ?>
  <script>  tinymce.remove(); tinymce.init(); </script>
  <style> .mce-panel {   width: 99%; }</style>
  <div class="col-12 card">
        <div class="card-header">
            <h5><?php echo $btnName ?> Products</h5>            
            <a href="javascript:void(0);" onclick="hide_product_details()" style="font-size:16px;" class="right-float label label-danger"> <i class="feather icon-x">Cancel</i></a>
            <hr>
        </div>
        <div class="card-block">                   
            <form action="javascript:void(0);" id="product_form" enctype="multipart/form-data">
                <input type="hidden" value="add_edit_product" name="act">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
        
                    <div class="row">
                        <div class="col-sm-3 col-lg-3">
                            <label class="col-form-label">First Name</label>
                            <div class="input-group input-group-inverse">
                                <input type="text" class="form-control" placeholder="Enter Your Product Name" name="product_name" value="<?php echo $product_name; ?>">
                            </div>
                        </div>

                        <div class="col-sm-3 col-lg-3">
                            <label class="col-form-label">SKU</label>
                            <div class="input-group input-group-inverse">
                                <span class="input-group-addon" onclick="reGeneratesku()">Generate</span>
                                <input type="text" class="form-control" id="sku_id"  placeholder="" name="sku"  value="PRO<?php echo rand( 100000 , 999999 ); ?>">
                            </div>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <label class="col-form-label">Price</label>
                            <div class="input-group input-group-inverse">
                            <span class="input-group-addon">₹</span>
                              <input type="text" class="form-control currency-field" name="price"  value="<?php echo $price; ?>" data-type="currency" placeholder="1,000,000.00" >
                            </div>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <label class="col-form-label">Special Price</label>
                            <div class="input-group input-group-inverse">
                            <span class="input-group-addon">₹</span>
                                <input type="text" class="form-control currency-field" name="special_price" value="<?php echo $special_price; ?>" data-type="currency" placeholder="1,000,000.00" >
                            </div>
                        </div>

                        <div id="file_div" class="row col-sm-12 col-lg-12">
                            <div class="col-sm-4 col-lg-4">
                                <label class="col-form-label">Upload Image</label>
                                <div class="input-group input-group-inverse">
                                    <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg"  name="upload_img[]">
                                    <input type="button" onclick="add_file()" class="btn btn-primary"  value="+">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <label class="col-form-label">Description</label>
                            <div class="input-group input-group-inverse">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter Description" id="description" name="description"><?php echo $description; ?></textarea>
                            </div>
                        </div>                                                              
                    </div>                    
                    <div class="row grid-layout">
                        <input type="submit" class="btn btn-grd-primary col-sm-3 ml-md-auto" value="Submit">
                    </div>
            </form>                   
        </div>
  </div>
  <script src="<?php echo ADMIN_JS ?>/tinymce/wysiwyg-editor.js"></script>
  <!-- <script type="text/javascript" src="<?php echo ADMIN_JS ?>/form-masking/form-mask.js"></script> -->
  <script>

    $(".currency-field").on({
        keyup: function() {
        formatCurrency($(this));
        },
        blur: function() { 
        formatCurrency($(this), "blur");
        }
    });

    $("form#product_form").submit(function() {
            tinyMCE.triggerSave();
            var formData = new FormData(this);        
                $.ajax({
                url: '<?php echo PRODUCT_DIR ?>/product_ajax.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    hide_product_details();
                    if (data == 'Success') {
                        tinymce.remove();
                  
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft',
                            'animated fadeOutLeft', 'Records Added Successfully!');
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft',
                            'animated fadeOutLeft', 'Please Try Again!');
                    }
                }
            });
        });
     
  </script>

<?php } ?>
