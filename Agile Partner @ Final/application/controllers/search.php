<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct(){
            parent::__construct();

            $this->load->helper('url');
            $this->load->helper('html');
            session_start();
    }

    public function index(){
        $this->load->model('model_search');
        if(!(isset($_POST['search']))){
            $this->load->view('view_header');
            $this->load->view('view_search');
        }
        else{
            //$val = 0;
            //if($_POST['Projects']==TRUE)
            $v = $this->input->post('v');
            $search=  $this->input->post('search');
            $query = $this->model_search->getEmployee($search, $v);
             echo json_encode ($query);
        }
    }

    public function getDetails()
    {
        $this->load->model('model_search');
        
        $search_q=  $this->input->post('keyword');
        //$v=$this->input->post('vall');
        $this->load->view('view_header');
        $this->load->model('model_get_search_value');

        $search_val=$this->input->post('search_val');
        //$users=$this->input->post('Users');

        if($search_val=='1'){
            $data1['result1']=$this->model_get_search_value->getProjects($search_q)->result();
            $this->load->view('view_searchProjects',$data1);
        }
        if($search_val=='2'){
            $data2['result2']=$this->model_get_search_value->getUsers($search_q)->result();
            $this->load->view('view_searchUsers',$data2);

        }
    }


   // function Employee(){
        //parent::CI_Controller();
        
  //  }
    
    
}
?>