function reGeneratesku() {
    var math = Math.floor(100000 + Math.random() * 900000);
    $('#sku_id').val('PRO' + math);
}

x = 1;

// function addMoreImages() {
//     html = '';

//     html += '<div class="more_images_' + x + '">'
//     html += '<input type="file" name="image[]"';

//     html += '</div>';

//     $('').append(html);
//     x++;
// }

var clicks = 0;
function add_file(){
    clicks += 1;
    $("#file_div").append(' <div class="col-sm-4 col-lg-4" id="more_images_' + clicks + '"><label class="col-form-label">Upload Image</label> <div class="input-group input-group-inverse"> <input type="file" class="form-control" name="upload_img[]" accept="image/x-png,image/gif,image/jpeg" > <input type="button" onclick="remove_file(this)" class="btn btn-primary" value="-"> </div> </div>');
    x++;
     // $("#file_div").append("<div><input type='file' name='file[]'><input type='button' value='REMOVE' onclick=remove_file(this);></div>");
}


function remove_file(ele)
{
 $(ele).parent().remove();
}







function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}






  
/**************************
 *     Products          *
 **************************/

// function hide_product_form() {
//     $('#product_form').hide();
// }

function hide_product_details() {
    $('.ajaxResponce').show();
    $('.product_form').hide();
    product_main_table();
}

product_main_table();
function product_main_table() {
    
    $('.preloader').show();
    // hide_product_details();
    // hide_product_form();
    param = { 'act': 'product_table' };
    ajax({
        a: 'product_table',
        b: $.param(param),
        c: function() {},
        d: function(data) {
            $('.preloader').hide();
            $('#product_table').show();
            $('#product_table').html(data);
        }
    });
}

function add_edit_product(id) {
    $('.preloader').show();
    $('.product_form').show();
    param = { 'act': 'add_edit_product', 'product_id': id };
    ajax({
        a: 'product_form',
        b: $.param(param),
        c: function() {},
        d: function(data) {
            $('.preloader').hide();
            $('.ajaxResponce').hide();
            $('#product_details').html(data);
        }
    });
}

function delete_product(id) {
    param = { 'act': 'remove_product', 'id': id };
    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete this product?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.value) {
            $('.preloader').show();
            ajax({
                a: "product_ajax",
                b: param,
                c: function() {},
                d: function(data) {
                    $('.preloader').hide();
                    var records = JSON.parse(data);
                    if (records.result == 'Success') {
                        hide_product_details();
                        product_main_table();
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    }
                }
            });
        }
    });
}

function statusProduct(id) {
    var ischecked = $('.status_update_' + id).is(':checked');
    if (!ischecked) { status = 'I'; } else { status = 'A'; }
    param = { 'act': 'product_status_change', 'status': status, 'id': id };
    Swal.fire({
        title: "Are you sure?",
        text: "You want to change status?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.value) {
            $('.preloader').show();
            ajax({
                a: "product_ajax",
                b: param,
                c: function() {},
                d: function(data) {
                    $('.preloader').hide();
                    var records = JSON.parse(data);
                    if (records.result == 'Success') {
                        product_main_table();
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    }
                }
            });
        } else {
            if (ischecked) { $('.status_update_' + id).prop('checked', false); } else {
                $('.status_update_' + id).prop('checked', true);
            }
        }
    });
}

/**************************
 *   End  Product        *
 **************************/