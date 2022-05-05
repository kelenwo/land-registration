<?php
Class Partners Extends CI_Controller {
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
    $data['contract'] = $this->main_model->get_contracts();
    $data['title'] = 'Add Business Partner';
    $this->parser->parse('head',$data);
    $this->parser->parse('add_partner',$data);
    $this->load->view('end');
  }
  public function list() {
    $data = $this->session->userdata();
    $data['contract'] = $this->main_model->get_contracts();
    $data['partner'] = $this->main_model->get_partners();
    $data['title'] = 'Business Partners';
    $this->parser->parse('head',$data);
    $this->parser->parse('list_partners',$data);
    $this->load->view('end');
  }
  public function publish_partner() {
  //Generate Unique contract
  $event = $this->main_model->publish_partner();
  if($event==true) {
  echo 'true';
  } else {
  echo $event;}
  }

  public function update_partner() {
  $event = $this->main_model->update_partner();
  if($event==true) {
  echo 'true';
  } else {
  echo $event;}
  }

  public function get_contract_number() {
  $event = $this->main_model->get_contract_number();
  if(empty($event)){
    echo '';
  } else {
  echo $event->contract_number;
}
  }

}
 ?>
