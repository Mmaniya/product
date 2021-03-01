<?php define('ABSPATH', dirname(__DIR__, 2));
require ABSPATH . "/includes.php";
$action = $_POST['act']; 
$productObj = new Products;
?>
<?php if ($action == 'product_table') {  ?>
    <div class="card-header bg-c-lite-green;">
        <h5>Product List</h5>
        <a href="javascript:void(0);" style="font-size:16px;" onclick="add_edit_product()"
            class="right-float label label-success"> <i class="feather icon-plus"> Add New</i></a>
    </div>
    <div class="card-block">
        <div class="card-block table-border-style">
                <div class="table-responsive">
                <form action="javascript:void(0);" id="product_position" style="width:100%">
                    <input type="hidden" name="act" value="product_position">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th >SKU</th>
                                <th >Price</th>
                                <th >Special Price</th>
                                <th style="text-align:center">Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="draggableProducts" class="draggable">
                            <?php  $statusArr = array('A' => 'checked', 'I' => '');  

                            $productObj->status = $_POST['status'];   
                            $rsProduct = $productObj->get_products();
                            if (count($rsProduct) > 0) {
                                foreach ($rsProduct as $key => $value) { ?>

                            <tr class="row_id_<?php echo $value->id; ?>" id="<?php echo $value->id; ?>">
                                <input type="hidden" name="product_id[]" value="<?php echo $value->id ?>">
                                <th><?php echo $key + 1 ?></th>
                                <td><a href="javascript:void(0);" onclick="view_category(<?php echo $value->id; ?>)"  class="text-primary"><?php echo $value->product_name ?></a></td>
                                <td><?php echo $value->sku ?></td>
                                <td><?php echo $value->price ?></td>
                                <td><?php echo $value->special_price ?></td>

                                <td>
                                    <a href="javascript:void(0);" class="label label-info" onclick="add_edit_product(<?php echo $value->id; ?>)"><i class="fa fa-edit"  aria-hidden="true"></i>Edit</a>
                                    <a href="javascript:void(0);" class="label label-danger" onclick="delete_product(<?php echo $value->id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="status_update_<?php echo $value->id; ?>" onchange="statusProduct(<?php echo $value->id; ?>)" <?php echo $statusArr[$value->status]; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <?php }} else {?>
                            <tr>
                                <td colspan="8" class="text-center"> No Records Found. Click here to <a
                                        href="javascript:void(0);" onclick="add_edit_product()" style="color:#01a9ac"> Add
                                        New</a> </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            Sortable.create(draggableProducts, {
                group: 'draggableProducts',
                animation: 150,
                accept: '.sortable-moves',
                onUpdate: function(ui) {
                    var param = $('form#product_position').serialize();
                    $('.preloader').show();
                    ajax({
                        a: "product_ajax",
                        b: param,
                        c: function() {},
                        d: function(data) {
                            var records = JSON.parse(data);
                            $('.preloader').hide();
                            category_table();
                            if (records.result == 'Success') {
                                $('#product_form').hide();
                                notify('top', 'right', 'fa fa-check', 'success','animated fadeInLeft', 'animated fadeOutLeft', records.data);
                            } else {
                                notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                            }
                        }
                    });
                },
            });
        });
    </script>
<?php } ?>
