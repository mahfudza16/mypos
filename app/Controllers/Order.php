<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_order;
use App\Models\M_product;
use CodeIgniter\Files\File;

class Order extends BaseController{
    function __construct(){
        $this->order = new M_order();
        $this->product = new M_product();
        $session = \Config\Services::session();
        if(!isset($session->username)){
            header("Location:".site_url('login'));
            exit();
        }
    }

    public function index(){
        $products = $this->product->get_active_product();
        $order_types = $this->order->get_order_types();
        $payment_methods = $this->order->get_payment_methods();

        return view('order/index', ['products' => $products,
        'order_types' => $order_types,
        'payment_methods' => $payment_methods ]);
    }

    public function make_order(){

        $product = $_POST['product'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $order_type = $_POST['order_type'];
        $payment_method = $_POST['payment_method'];

        $data = [];
        for($i=0;$i<count($product);$i++){
            array_push($data, [$product[$i], $qty[$i], $price[$i]]);
        }

        $p_order = json_encode($data);

        $data_order = array(
            "product" => $p_order,
            "order_type" => $order_type,
            "payment_method" => $payment_method,
            "created_by" => $_SESSION['userid']
        );

        $result = $this->order->insert_order($data_order);

        if($result){
            $_SESSION['msg'] = 'Berhasil menambahkan pesanan.';
            header("Location:".site_url("order"));
            exit();
        }else{
            $_SESSION['msg'] = 'Gagal menambahkan pesanan';
            
        }
    }

}