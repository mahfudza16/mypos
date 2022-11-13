<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_order;
use App\Models\M_setup;
use App\Models\M_product;

class Setup extends BaseController{
    function __construct(){
        $this->setup = new M_setup();
        $this->order = new M_order();
        $this->product = new M_product();
        $session = \Config\Services::session();
        if(!isset($session->username)){
            header("Location:".site_url('login'));
            exit();
        }
    }

    public function index(){
        $product_cat = $this->product->get_product_category();
        $order_types = $this->order->get_order_types();
        $payment_methods = $this->setup->get_payment_methods();
        $outlet = $this->setup->get_outlet();
        $expense_cat = $this->setup->get_expense_category();

        return view('setup/index', ['product_cat' => $product_cat,
        'order_types' => $order_types,
        'payment_methods' => $payment_methods,
        'outlet' => $outlet,
        'expense_cat' => $expense_cat ]);
    }

    public function get_product_by_id($id){
        $data = $this->produk->get_product_by_id($id);
        return $data;
    }

    public function make_order(){
        

        $result = $this->produk->insert_product($data);

        if($result){
            header("Location:".site_url("produk"));
            exit();
        }else{
            if(isset($_SESSION['msg']) && $_SESSION['msg'] != ''){
                $_SESSION['msg']= $_SESSION['msg'].'<br>'.'Gagal menambahkan produk';
            }else{
                $_SESSION['msg'] = 'Gagal menambahkan produk';
            }
        }
    }

    public function update($id=null){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $data = $this->get_product_by_id($id);
            return view('produk/update', ['data' => $data]);
        }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            $data = [
                'nama' => $_POST['nama'],
                'harga' => $_POST['harga'],
                'jumlah' => $_POST['jumlah']
            ];
            $id = $_POST['id'];
            $result = $this->produk->update_product($id, $data);
    
            if($result){
                return $this->index();
            }else{
                $_SESSION['msg'] = 'Gagal memperbaharui data produk';
            }
        }
    }

    public function delete($id){
        $result = $this->produk->delete_product($id);

        if($result){
            return $this->index();
        }else{
            $_SESSION['msg'] = 'Gagal menghapus data produk';
        }
    }
}