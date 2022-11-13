<?php

namespace App\Models;
use CodeIgniter\Model;

class M_product extends Model{

    function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function get_products(){
        //$builder = $this->db->table('products'); 
        //$query = $builder->get();  
        $query = $this->db->query('select a.id, a.name, a.description, a.price, a.picture, a.active, a.category, b.name as p_category from products as a inner join categories as b on a.category=b.id order by p_category');
        return $query->getResult();
    }

    public function get_product_by_id($id){
        $builder = $this->db->table('products');
        $query = $builder->get();
        $query   = $builder->getWhere(['id' => $id]);
        return $query->getResult();
    }

    public function get_active_product(){
        $builder = $this->db->table('products');
        $query = $builder->get();
        $query   = $builder->getWhere(['active' => 1]);
        return $query->getResult();
    }

    public function get_product_category(){
        $builder = $this->db->table('categories');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insert_product($data){
        $result = true;
        foreach($data as $d){
            $query = $this->db->table('products')->insert($d);
            if($query == false){
                $result = false;
            }
        }
        return $result;
    }

    public function update_product($id, $data){
        $builder = $this->db->table('products');
        $builder->where('id', $id);
        $builder->update($data);
        return $builder;
    }

    public function delete_product($id){
        $builder = $this->db->table('products');
        $builder->where('id', $id);
        $builder->delete();
        return $builder;
    }
}