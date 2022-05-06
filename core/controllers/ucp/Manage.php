<?php
//require 'vendor/autoload.php';

class Manage extends CI_Controller {
  public function __construct()
  {
          parent::__construct();
if(empty($this->session->email)) {
  header('Location:'.base_url().'ucp/login/signin/return/'.str_replace('/','-',uri_string()));
}
elseif($this->session->rights !=='administrator') {
    header('Location:'.base_url('dashboard/index'));
}

}
        public function index() {
$data = $this->session->userdata();
$data['events'] = $this->admin_model->get_events_limit();
$data['users_count'] = $this->admin_model->count_users();
$data['contracts_count'] = $this->admin_model->count_contracts();
$data['contracts_pending_count'] = $this->admin_model->count_contracts_pending();
$data['contracts_approved_count'] = $this->admin_model->count_contracts_approved();
$data['contracts_active_count'] = $this->admin_model->count_contracts_active();
$data['title'] = "Admin Panel";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/index',$data);
        }

public function approved_properties() {
$data = $this->session->userdata();
$arr = $this->property_model->get_properties_approved();
$i=0;
foreach($arr as $val) {
  $usr = $this->user_model->get_userdata($val['author_email']);
  array_push($arr[$i],$usr[0]);
  $i++;
}
//var_dump($arr);
$data['bids'] = $arr;
$data['title'] = "Admin Panel - Approved Properties";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/approved_contracts',$data);
}

public function pending() {
  $data = $this->session->userdata();
$data['bids'] = $this->property_model->get_properties_pending();
$data['title'] = "Admin Panel - bids";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/pending',$data);
}

public function properties() {
  $data = $this->session->userdata();
$data['bids'] = $this->property_model->get_properties_approved();
$data['title'] = "Admin Panel - Articles";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/properties',$data);
}


public function events() {
  $data = $this->session->userdata();
$data['events'] = $this->admin_model->get_events();
$data['title'] = "Admin Panel - Events";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/events',$data);
}

public function users() {
  $data = $this->session->userdata();
  $data['user'] = $this->user_model->get_user();
$data['title'] = "Admin Panel - Users";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/users',$data);
}


public function publish_contract() {
//Generate Unique contract number
$rand = random_string('alpha', 2);
$id = $this->contract_model->count_contracts();
if($id < 1) {
  $nid = 'PCLBD0001'.$rand;
} elseif($id>=1 && $id<10) {
  $ids = $id+1;
 $nid = 'PCLBD000'.$ids.$rand;
}
elseif($id>9) {
    $ids = $id+1;
  $nid = 'PCLBD00'.$ids.$rand;
}
$contract = $this->contract_model->publish_contract($nid);
if($contract==true) {
echo 'true';
} else {
echo $contract;}
}


public function save_event() {
$event = $this->admin_model->save_event();
if($event==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function update_events() {
$event = $this->admin_model->update_event();
if($event==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function update_contract() {
$contract = $this->contract_model->update_contract();
if($contract==true) {
echo 'true';
} else {
echo $contract;}
}

public function update_contract_bid() {
$contract = $this->contract_model->update_contract_bid();
if($contract==true) {
  if($this->input->post('bid_status')=="authorized") {
  $this->email->from('no-reply@eprocloud.com','ePROCLOUD');
  $this->email->to($this->input->post('bid_by_email'));
  $this->email->subject('ePROCLOUD - Contract Approved');
  $this->email->message('Your Contract bid Approved!, Kindly Continue to your dashboard to confirm the contract.');
  $send = $this->email->send();
if($send) {
  echo 'true';
} else {
  show_error($this->email->print_debugger());
     return false;
}
} elseif($this->input->post('contract_status')=="active") {
  $this->email->from('no-reply@eprocloud.com','ePROCLOUD');
  $this->email->to($this->input->post('bid_by_email'));
  $this->email->subject('ePROCLOUD - Contract Approved');
  $this->email->message('Your Contract is now Active!, Kindly Continue to your dashboard to confirm contract.');
  $send = $this->email->send();
if($send) {
  echo 'true';
} else {
  show_error($this->email->print_debugger());
     return false;
}
} elseif($this->input->post('has_finished')=="completed") {
  $c = $this->contract_model->update_contract_where();
  if($c==true) {
    echo 'true';
  } else {
    echo $c;
  }
}
 else {
  echo 'true';
}
} else {
echo $contract;}
}

public function update_user() {
$issue = $this->user_model->update_user();
if($issue==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function news() {
  $data = $this->session->userdata();
$data['news'] = $this->user_model->get_news();
$data['title'] = "Admin Panel - News";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/news',$data);
}

public function update_news() {
$issue = $this->user_model->update_news();
if($issue==true) {
echo 'true';
} else {
echo 'fail';}
}

//handles delete button
public function delete_item() {
$del = $this->main_model->delete_item();
if($del==true) {
echo 'true';
} else {
echo $del;}
}

public function get_new_approved() {
  $data = $this->admin_model->count_new_approved();
  echo $data;
}

}
