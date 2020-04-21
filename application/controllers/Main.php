<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('orders_model');
        $this->load->model('product_model');
    }
 
    function index(){
        $data['data']=$this->product_model->get_all_product();
        $this->load->view('includes/header', $data);
        $this->load->view('product_view',$data);
        $this->load->view('includes/footer', $data);	        
    }
 
    function add_to_cart(){ 
        $data = array(
            'id' => $this->input->post('product_id'), 
            'name' => $this->input->post('product_name'), 
            'price' => $this->input->post('product_price'), 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($data);
        echo $this->show_cart(); 
    }
 
    function show_cart(){ 
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="remove_cart btn btn-danger btn-sm">Cancel</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'KSH '.number_format($this->cart->total()).'</th>
            </tr>
            <tr>
                <td><a href="/onlineshop/main/checkout"><button type="button" id=checkout" class="add_cart btn btn-success btn-block">Checkout</button></a></td>
            </tr>
        ';
        return $output;
    }
 
    function checkout()
    {
        $data['cart'] = $this->cart;
        $this->load->view('includes/header', $data);
        $this->load->view('checkout_view',$data);
        $this->load->view('includes/footer', $data);	          
    }
    function load_cart(){ 
        echo $this->show_cart();
    }
 
    function delete_cart(){ 
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function add_order(){
        $customername = $this->input->post('customerName');
        $mobileNo = $this->input->post('mobileNo');
        $email = $this->input->post('inputEmail');
        $address = $this->input->post('address');
        $paymentmode = $this->input->post('paymentmode');

        $next_customer_order_id = $this->orders_model->getnextcustomerorderid();

        $order_details = array
        (
            'customername' => $customername,
            'mobileNo' => $mobileNo,
            'email' => $email,
            'address' => $address,
            'paymentmode' => $paymentmode,
            'total'=>$this->cart->total()
        );

        $orders = array();
        foreach ($this->cart->contents() as $items)
        {
            $order = array(
                    'customer_order_id' => $next_customer_order_id,
                    'customer_name' => $customername,
                    'customer_email' => $email,
                    'customer_mobileno' => $mobileNo,
                    'customer_address' => $address,
                    'customer_paymentmode' => $paymentmode,
                    'product_price' =>$items['price'],
                    'product_qty' => $items['qty'],
                    'product_total_price' => $items['subtotal'],
                    'product_name' => $items['name'],
                    'product_image' => ''
            );

            array_push($orders, $order);
            $this->orders_model->add_order($order);
        }

        $order_details['orders'] = $orders;
        $this->order_success($order_details);
    }

    function order_success($order_details){
        $this->cart->destroy();
        $data['title'] = 'Success';
        $data['orderdetails'] = $order_details;
        $this->load->view('includes/header', $data);
        $this->load->view('order_successful',$data);
        $this->load->view('includes/footer', $data);	        
    }

    function view_order(){
        $this->cart->destroy();
        $data['title'] = 'Success';
        $this->load->view('includes/header', $data);
        $this->load->view('order_view',$data);
        $this->load->view('includes/footer', $data);	        
    }    
}
