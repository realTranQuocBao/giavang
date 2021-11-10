<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GiaVang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->data['comp'] = 'giavang';
    }

    public function index()
    {
        $this->data['view'] = 'index';
        $this->data['title'] = 'Giá vàng hôm nay';

        // $arrContextOptions = array(
        //     "ssl" => array(
        //         "verify_peer" => false,
        //         "verify_peer_name" => false,
        //     ),
        // );
        // $url = "https://www.sjc.com.vn/xml/tygiavang.xml";
        // $xmlData = file_get_contents($url, false, stream_context_create($arrContextOptions));;

        $this->crawlData();
        $this->load->view('layout', $this->data);
    }

    public function report()
    {
        $this->data['view'] = 'report';
        $this->data['title'] = 'Biểu đồ giá vàng';
        $this->load->view('layout', $this->data);
    }

    private function fixTimeSjc($xmlDataTime){
        $fulltime = explode(' ', $xmlDataTime);
        $time = explode('/', $fulltime[2]);
        return "$fulltime[0] $fulltime[1] $time[1]/$time[0]/$time[2]";
    }

    private function crawlData(){
        $this->curl->create('http://www.sjc.com.vn/xml/tygiavang.xml');
        $this->curl->option('SSL_VERIFYPEER', false);
        $xmlData = $this->curl->execute();
        $xmlData = simplexml_load_string($xmlData);
        $xmlData->ratelist['updated'] = $this->fixTimeSjc($xmlData->ratelist['updated']);
        $this->data['xml'] = $xmlData;
    }

    public function updateTable(){
        $this->crawlData();
        return $this->load->view('components/giavang/table_giavang', $this->data);
    }

}
