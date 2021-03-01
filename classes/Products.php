<?php 
class Products {

    public function get_product_count(){               
        $qry ="select id, count(*) total,
            sum(case when status = 'A' then 1 else 0 end) total_active,
            sum(case when status = 'I' then 1 else 0 end) total_inctive
            from ".TBL_PRODUCT."";
        return  dB::sExecuteSql($qry);  
    }

    public function get_products(){  
        if(!empty($this->id)){
            $query = "SELECT *  from ".TBL_PRODUCT." WHERE id =".$this->id.""; 
        } else { 
            $query = "SELECT *  from ".TBL_PRODUCT." ORDER BY position ASC";         
        }
        return dB::mExecuteSql($query);   
    }

    function addProduct($param){
        $qry = Table::insertData(array('tableName' => TBL_PRODUCT, 'fields' => $param, 'showSql' => 'N'));
        $result = explode('::', $qry);
        return $result[0];
    }

    
    function updateProduct($param){
        $where = array('id' => $_POST['id']);
        $qry = Table::updateData(array('tableName' => TBL_PRODUCT, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
        $result = explode('::', $qry);
        return $result[0];
    }
}
