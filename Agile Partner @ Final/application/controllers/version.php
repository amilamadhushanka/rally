<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  class Version extends CI_Controller{

    public function __construct(){
      parent::__construct();

      $this->load->helper('url');
      $this->load->helper('html');
      session_start();
    }

    public function index(){
      
      $this->load->view('view_version');
      
      }
    
      //call this after vertion upload
    public function iupload(){
     
      $this->load->model('model_version');
      $result=$this->model_version->upload();
      if ($result) {    
      $this->load->view('view_version');    
      }
      }

      // call this when click the button
      public function fupload(){
        $this->load->model('model_version');
        $result=$this->model_version->upload();
        if ($result) {    
        $this->load->view('view_version');    
        }

      }
    

  }

?>