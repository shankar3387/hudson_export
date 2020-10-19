<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PaypalProduct extends CI_Model{
    public function __construct()
    {
    }
    //get and return product rows
    public function getProducts($id = ''){
        $this->db->select('to.id,to.tbl_total_amount,to.tbl_user_id,tp.product_name');
        $this->db->from('tbl_order as to');
        $this->db->join('tbl_product as tp','tp.id=to.tbl_product_id');
        if($id){
            $this->db->where('to.id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            // $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
 
    //insert transaction data
    public function storeTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
}