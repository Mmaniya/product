<?php 
define('ABSPATH', dirname(__DIR__, 2));
require ABSPATH . "/includes.php";
$action = $_POST['act'];

// 1. Add Product
if ($action == 'add_edit_product') {
    ob_clean();

    $param['product_name']     = $_POST['product_name'];
    $param['sku']              = $_POST['sku'];
    $param['price']            = $_POST['price'];
    $param['special_price']    = $_POST['special_price'];
    $param['description']      = check_input($_POST['description']);

    $total = count($_FILES['upload_img']['name']);

    for( $i=0 ; $i < $total ; $i++ ) {
        if ($_FILES['upload_img']['name'][$i] != '') {
            $_FILES['upload_img']['name'][$i];
            $newFileName = '';
            $filename = basename($_FILES['upload_img']['name'][$i]);
            $file_tmp = $_FILES['upload_img']["tmp_name"][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $baseName = basename($filename, $ext);
            $newFileName = rand() . '.' . $ext;
             $arr[] = $newFileName;
            move_uploaded_file($file_tmp = $_FILES['upload_img']["tmp_name"][$i], "uploads/" . $newFileName) or die('image upload fail');
       }
    }
    $param['upload_img'] = implode(',',$arr);
    if (empty(trim($_POST['id']))) {
        echo $resultData = Products::addProduct($param);
    }else{
        echo $resultData = Products::updateProduct($param);
    }
    exit();
}

// 2.Product remove
if($action == 'remove_product'){
    ob_clean();

    $where = array('id' => $_POST['id']);
    $result = Table::deleteData(array('tableName' => TBL_PRODUCT, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
    $response = array("result" => 'Success', "data" => 'Successfully Removed');
    echo json_encode($response);

    exit();
}

// 3.Product position

if($action =='product_position'){
    ob_clean();
    if (count($_POST['product_id']) > 0) {
        foreach ($_POST['product_id'] as $key => $val) {
            $param['position'] = $key + 1;
            $where = array('id' => $val);
            $result = Table::updateData(array('tableName' => TBL_PRODUCT, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
        }
    }
    exit();
}

// 4.role status chnage

if ($action == 'product_status_change') {
    $param['status'] = $_POST['status'];
    $where = array('id' => $_POST['id']);
    $result = Table::updateData(array('tableName' => TBL_PRODUCT, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
    $response = array("result" => 'Success', "data" => 'Updated Successfully');
    echo json_encode($response);
}


