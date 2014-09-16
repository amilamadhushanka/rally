<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  class ViewUnAssignTask extends CI_Controller{

    public function __construct(){
      parent::__construct();

      $this->load->helper('url');
      $this->load->helper('html');
      session_start();

    }

    public function index(){
      $this->load->view('view_viewUnAssignTask');
    }

  }

?>