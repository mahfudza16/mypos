<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_auth;

class Auth extends BaseController{
    function __construct(){
        session_start();
        $this->auth = new M_auth();
    }

    public function login(){
        //die(var_dump($_SESSION));
        if($_SERVER['REQUEST_METHOD']=='GET'){
            if(isset($this->session->username)){
                header("Location:".site_url('produk'));
                exit();
            }else{
                return view('login');
            }
        }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $auth = $this->auth->login($username, $password);
            $session=session();
            
            if($auth){
                
                $session->set('username', $username);
                $session->set('userid', $auth[0]->id);
                //die(var_dump($_SESSION));
                //die("test");
                header("Location:".site_url("produk"));
                exit();
            }else{
                header("Location:".site_url("login?msg=Maaf, login gagal."));
                exit();
            }
        }
    }

    public function daftar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            if(isset($this->session->username)){
                header("Location:".site_url('produk/index'));
                exit();
            }else{
                return view('daftar');
            }
        }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            $users = $this->auth->get_users();
            $number_of_user = count($users);

            if($number_of_user==0){
                $role = 1;
            }else{
                $role = 2;
            }

            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $email = $_POST['email'];
            $auth = $this->auth->daftar($username, $password, $nama_lengkap, $email, $role);

            if($auth){
                header("Location:".site_url("daftar?msg=Berhasil mendaftarkan user."));
                exit();
            }else{
                header("Location:".site_url("daftar?msg=Gagal mendaftarkan user."));
                exit();
            }
        }
    }

    public function logout(){
        $this->session->destroy();
        header("Location:".site_url('login'));
        exit();
    }

}