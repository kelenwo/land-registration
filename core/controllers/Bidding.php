<?php
Class Bidding Extends CI_Controller {
  public function __construct()  {
          parent::__construct();
if(empty($this->session->email)) {
  header('Location:'.base_url().'ucp/login/signin/return/'.str_replace('/','-',uri_string()));
}  else {
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

  public function current() {
    $data = $this->session->userdata();
    $data['bid'] = $this->main_model->get_approved_bids();
    $data['title'] = 'Current Bids';
    $this->parser->parse('head',$data);
    $this->parser->parse('current_bids',$data);
    $this->load->view('end');
  }
  public function pending() {
    $data = $this->session->userdata();
    $data['bid'] = $this->main_model->get_bids();
    $data['title'] = 'Bids Pending Approval';
    $this->parser->parse('head',$data);
    $this->parser->parse('pending_bids',$data);
    $this->load->view('end');
  }
  public function bid() {
    $data = $this->session->userdata();
    $data['contracts'] = $this->contract_model->get_contracts();
    $data['title'] = 'Bid Contract';
    $this->parser->parse('head',$data);
    $this->parser->parse('bid_contract',$data);
    $this->load->view('end');
  }
  public function contract_details($bid_number) {
    $dat = $this->main_model->get_contracts_where($bid_number);
    $arr = get_object_vars($dat);
    $data = array_merge($arr,$this->session->userdata());
    $data['title'] = 'Contract Details ';
    $data['bid_status'] = $this->contract_model->check_bid_status($bid_number);
    $this->parser->parse('head',$data);
    $this->parser->parse('contract_details',$data);
    $this->load->view('end');
  }
  public function placebid() {
  $bid = $this->main_model->placebid();
  if($bid==true) {
  echo 'true';
  } else {
  echo $bid;}
  }

  public function do_upload(){
$type = $this->input->post('type');
  $config['allowed_types']        = 'pdf|doc|docx|jpg|jpeg|png';
  $config['max_size']             = 10000;
  $config['upload_path']          = './uploads/boc/';
  $this->upload->initialize($config);
        if($this->upload->do_upload('doc')){
  $document = $this->upload->data('file_name');
  $arr = array(
    'success' => 'true',
    'file_name' => $document,
  );
  echo json_encode($arr);
        } else {
          $msg = $this->upload->display_errors();
          $arr = array(
            'success' => 'false',
            'msg' => $msg,
          );
          echo json_encode($arr);
    }
  }
}
 ?>
