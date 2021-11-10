<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Home extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->data['comp'] = 'trangnha';
        }
        
        public function index(){
            $this->data['view'] = 'index';
            $this->data['title'] = "Trang nhà - Xem giá vàng & tỷ giá ngoại tệ mới nhất";


            $this->load->view('layout', $this->data);
        }



    }

