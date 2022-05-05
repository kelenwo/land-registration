<?php
Class Events Extends CI_Controller {
  public function __construct()  {
          parent::__construct();
//if not logged in, redirect to login page
if(empty($this->session->email)) {
  header('Location:'.base_url().'ucp/login/signin/return/'.str_replace('/','-',uri_string()));
} else {
  $get = $this->user_model->get_biodat();
  $this->session->set_userdata($get[0]);
}
}
  public function add() {
    $data = $this->session->userdata();
    $data['title'] = 'Event-Add';
    $this->parser->parse('head',$data);
    $this->parser->parse('add_event',$data);
    $this->load->view('end');
  }
  public function list() {
    $data = $this->session->userdata();
    $data['event'] = $this->main_model->get_events();
    $data['title'] = 'Events - List';
    $this->parser->parse('head',$data);
    $this->parser->parse('list_events',$data);
    $this->load->view('end');
  }
  public function publish_event() {
  //Generate Unique contract
  $event = $this->main_model->publish_event();
  if($event==true) {
  echo 'true';
  } else {
  echo $event;}
  }

  public function update_event() {
  $event = $this->main_model->update_event();
  if($event==true) {
  echo 'true';
  } else {
  echo $event;}
  }

}
 ?>
