<?php

namespace App\Models;
use CodeIgniter\Model;

class M_auth extends Model{

    function __construct(){
        $db = \Config\Database::connect();
        $this->builder = $db->table('users');
    }

    public function get_users(){   
        //$builder = $this->db->table('users');
        $query = $this->builder->get();
        return $query->getResult();
    }

    public function login($username, $password){
        //$builder = $this->db->table('users');
        $query = $this->builder->get();
        $query   = $this->builder->getWhere([
            'username' => $username, 
            'password' => $password]
        );
        return $query->getResult();
    }

    public function daftar($username, $password, $nama_lengkap, $email, $role){
        $data=[
            'username' => $username,
            'password' => $password,
            'nick_name' => $nama_lengkap,
            'email' => $email,
            'role' => $role
        ];
        $query = $this->builder->insert($data);
        return $query;
    }

}