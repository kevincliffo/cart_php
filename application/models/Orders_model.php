<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders_model extends CI_Model{
    function get_all_orders(){
        $result=$this->db->get('orders');
        return $result;
    }

    function getnextcustomerorderid()
    {
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(customer_order_id) AS MAX_Customer_Order_Id FROM orders';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $customer_order_id = (int)$result->result()[0]->MAX_Customer_Order_Id ;
        }
        else
        {
            $customer_order_id = 0;
        }

        $customer_order_id = $customer_order_id + 1;

        return $customer_order_id;
    }
     
    function add_order($order)
    {
        $this->db->query("SET sql_mode = '' ");
        $insert = $this->db->insert('orders', $order);
        return $insert;
    }    
}