<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  class Images extends CI_Controller{

    public function __construct(){
      parent::__construct();

      $this->load->helper('url');
      $this->load->helper('html');
      session_start();
    }

    public function index(){
      
      $this->load->library('form_validation');

      $this->load->view('view_images');
      
      }
    

    public function iupload(){
     
      $this->load->model('model_images');
      $result=$this->model_images->upload();
      if ($result) {    
       $this->load->view('view_images');    

      }
    }

  }

?>