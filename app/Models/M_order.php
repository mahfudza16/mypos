<?php

namespace App\Models;
use CodeIgniter\Model;

class M_order extends Model{

    function __construct(){
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('orders');
    }

    public function get_order_types(){
        $builder = $this->db->table('order_types');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_payment_methods(){
        $builder = $this->db->table('payment_methods');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insert_order($data){
        $query = $this->builder->insert($data);
        return $query;
    }

    public function get_order_data(){
        $query = $this->builder->get();
        return $query->getResult();
    }
}