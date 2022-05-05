<?php
Class Workflows Extends CI_Controller {
  public function __construct()  {
          parent::__construct();
if(empty($this->session->email)) {
  header('Location:'.base_url().'ucp/login/signin/return/'.str_replace('/','-',uri_string()));
} else {
  $get = $this->user_model->get_biodat();
  $this->session->set_userdata($get[0]);
}
$bids = $this->contract_model->get_contracts();
foreach ($bids as $bid) {
  if(strtotime($bid['bid_closing_date']) < strtotime(date('d F, Y'))) {
//$bid_amount = $bid['bid_amount'];
$bid_number = $bid['bid_number'];
$bid_avg = $this->contract_model->get_bids_avg($bid_number);
if(!empty($bid_avg)) {
$off = $bid_avg;
  $bidwin = $off[floor(count($off)/2)];
  //var_dump($bidwin);
  if($bidwin['bid_status']=='pending') {
  $update = $this->contract_model->update_bid_auto($bidwin['bid_number'],$bidwin['id']);
  }
}
  }
}
}
  public function index() {

    $data = $this->session->userdata();
    $data['contracts_new'] = $this->main_model->get_contracts_new();
    $data['contracts_count'] = $this->main_model->count_contracts();
    $data['contracts_finished'] = $this->main_model->count_contracts_finished();
    $data['contracts_pending_count'] = $this->main_model->count_contracts_pending();
    $data['contracts_approved_count'] = $this->main_model->count_contracts_approved();
    $data['contracts_active_count'] = $this->main_model->count_contracts_active();
    $data['contract'] = $this->main_model->get_contracts();
    $data['title'] = 'Dashboard - Workflows';
    $data['contracts'] = $this->contract_model->get_contracts();
    $this->parser->parse('head',$data);
    $this->parser->parse('workflow',$data);
    $this->load->view('end');
  }

  public function publish_contract() {
  //Generate Unique contract
  $contract = $this->main_model->publish_contract();
  if($contract==true) {
  echo 'true';
  } else {
  echo $contract;}
  }

  public function publish_contract_bid() {
  //Generate Unique contract
  $this->main_model->update_contract_bid();
  $contract = $this->main_model->publish_contract();
  if($contract==true) {
  echo 'true';
  } else {
  echo $contract;}
  }

  public function list() {
    $data = $this->session->userdata();
    $data['contract'] = $this->main_model->get_contracts();
    $data['title'] = 'Dashboard - List Contracts';
    $this->parser->parse('head',$data);
    $this->parser->parse('list_contracts',$data);
    $this->load->view('end');
  }

  public function details() {
    $data = $this->session->userdata();
    $data['title'] = 'Dashboard - Pending Bids ';
    $this->parser->parse('head',$data);
    $this->parser->parse('contract_details',$data);
    $this->load->view('end');
  }

  public function workflows() {
    $data = $this->session->userdata();
    $data['contract'] = $this->main_model->get_contracts();
    $data['title'] = 'Dashboard - List Contracts';
    $this->parser->parse('head',$data);
    $this->parser->parse('workflow',$data);
    $this->load->view('end');
  }


  public function update_contract() {
  $contract = $this->main_model->update_contract();
  if($contract==true) {
  echo 'true';
  } else {
  echo $contract;}
  }
}
 ?>
