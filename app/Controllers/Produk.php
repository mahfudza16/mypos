<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_product;
use CodeIgniter\Files\File;

class Produk extends BaseController{
    function __construct(){
        $this->produk = new M_product();
        session_start();
        /*
        $session=session();
        die(var_dump($this->session));
        if(!isset($this->session->username)){
            header("Location:".site_url('login'));
            exit();
        }
        */
    }

    public function index(){
        //$session=session();
        //die(var_dump($_SESSION));
        $data = $this->produk->get_products();
        return view('produk/index', ['data' => $data]);
    }

    public function get_product_by_id($id){
        $data = $this->produk->get_product_by_id($id);
        return $data;
    }

    public function insert(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $data['categories'] = $this->produk->get_product_category();
            return view('produk/insert', $data);
        }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            $data = [];

            $validationRule = [
                'picture' => [
                    'label' => 'picture',
                    'rules' => 'uploaded[picture]'
                    . '|is_image[picture]'
                    . '|mime_in[picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[picture,2000]'
                ]
            ];

            if(!$this->validate($validationRule)){
                $errors = $this->validator->getErrors();
                $msg = implode('<br>', $errors);
                $_SESSION['msg'] = $msg;
                header("Location:".site_url("produk"));
                exit();
            }

            $result = false;
            $target = "uploads/";

            $picture = $this->request->getFile('picture');

            if(!$picture->hasMoved()){
                $filepath = WRITEPATH.$target.$picture->store('img');
                $picture_name = 'img/'.$picture->getName();
                for($i=0; $i<count($_POST['name']);$i++){
                    array_push($data, [
                        'name' => $_POST['name'][$i],
                        'description' => $_POST['description'][$i],
                        'price' => $_POST['price'][$i],
                        'picture' => $picture_name,
                        'active' => $_POST['active'][$i],
                        'category' => $_POST['category'][$i]
                    ]);
                }
                $result = $this->produk->insert_product($data);
            }
    
            if($result){
                header("Location:".site_url("produk"));
                exit();
            }else{
                if(isset($_SESSION['msg']) && $_SESSION['msg'] != ''){
                    $_SESSION['msg']= $_SESSION['msg'].'<br>'.'Gagal menambahkan produk';
                }else{
                    $_SESSION['msg'] = 'Gagal menambahkan produk';
                }
                header("Location:".site_url("produk"));
                exit();
            }
        }
    }

    public function update($id=null){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $data = $this->get_product_by_id($id);
            $categories = $this->produk->get_product_category();
            return view('produk/update', ['data' => $data, 'categories' => $categories]);
        }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'category' => $_POST['category'],
                'active' => $_POST['active']
            ];
            $id = $_POST['id'];
            $result = $this->produk->update_product($id, $data);
    
            if($result){
                $_SESSION['msg'] = 'Berhasil memperbaharui data produk';
            }else{
                $_SESSION['msg'] = 'Gagal memperbaharui data produk';
            }
            header("Location:".site_url("produk"));
            exit();
        }
    }

    public function delete($id){
        $result = $this->produk->delete_product($id);

        if($result){
            $_SESSION['msg'] = 'Berhasil menghapus data produk';
        }else{
            $_SESSION['msg'] = 'Gagal menghapus data produk';
        }
        header("Location:".site_url("produk"));
        exit();
    }
}