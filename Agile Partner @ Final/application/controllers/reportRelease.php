<?php
class ReportRelease extends CI_Controller {
   
  /**
   * The __construct function is called so that I don't have to load the model each and every time.
   * And any change while refactoring or something else would mean change in only one place.
   */
  function __construct() {
    parent::__construct();
    session_start();
    $this->load->model('model_report_release');
    
  }
   
  /**
   * This is the first method which get's executed when someone will go to the site section.
   */
  function load($project) {
    //$project=$this->input->post('select_project');
    $data['reportRelease'] = $this->model_report_release->getVelocity($project);
    $data['project'] =$project;

    $this->load->view('view_header');
    $this->load->view('view_reportRelease',$data);
  }
}
?>