<?php

namespace App\Models;
use CodeIgniter\Model;

class M_setup extends Model{

    function __construct(){
        $this->db = \Config\Database::connect();
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
}