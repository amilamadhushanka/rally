<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  class Download extends CI_Controller{

    public function __construct(){
      parent::__construct();

      $this->load->helper('url');
      $this->load->helper('html');
      session_start();
    }

    public function index(){
      
      $this->getversion();
      
      }

      public function getversion()
      {
        

         $this->load->model('model_download');
         $data ['query'] = $this->model_download->getversion();
         $this->load->view('view_settings_header'); 
         $this->load->view('view_download', $data);
      }
  

  }

?>