<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class NgoaiTe extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->data['comp'] = 'ngoaite';
        }
        
        public function index(){
            //echo "hihi";
            $this->data['view'] = 'index';
            $this->data['title'] = 'Tỷ giá ngoại tệ hôm nay';

            //https://www.formget.com/curl-library-codeigniter/
            // $xmlData = simplexml_load_file(base_url('assets/uploads/ngoaite.xml'));
            $this->crawlData();
            
            $this->load->view('layout', $this->data);
        }
        
        public function report(){
            $this->data['view'] = 'report';
            $this->data['title'] = 'Biểu đồ tỷ giá ngoại tệ';
            $this->load->view('layout', $this->data);
        }
        
        public function updateTable(){
            $this->crawlData();
            return $this->load->view('components/ngoaite/table_ngoaite', $this->data);
        }

        private function crawlData(){
            $this->curl->create('https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx');
            $xmlData = $this->curl->execute();
            $xmlData = simplexml_load_string($xmlData);
            $this->data['xml'] = $xmlData;
        }


    }

