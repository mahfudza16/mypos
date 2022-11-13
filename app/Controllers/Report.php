<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_order;
use App\Models\M_product;

class Report extends BaseController{
    function __construct(){
        $this->order = new M_order();
        $session = \Config\Services::session();
        if(!isset($session->username)){
            header("Location:".site_url('login'));
            exit();
        }
    }

    public function index(){
        $orders = $this->order->get_order_data();
        return view('report/index', ['data' => $orders]);
    }
}