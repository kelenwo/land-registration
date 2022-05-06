<?php
Class Property_model Extends CI_model {



  public function publish_contract($nid) {
    $arr = $this->input->post();
    $new = array('bid_number' => mb_strtoupper($nid));
    $data = array_merge($arr,$new);
    $query = $this->db->insert('contract_bidding', $data);
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

  public function count_contracts() {
  $this->db->select('*');
  $this->db->from('contract_bidding');
  return $this->db->count_all_results();
  }

  public function update_contract() {
    $this->db->where('id',$this->input->post('id'));
    $query = $this->db->update('contract_bidding', $this->input->post());
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

  public function update_contract_bid() {
    $this->db->where('id',$this->input->post('id'));
    $query = $this->db->update('bids', $this->input->post());
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

  public function update_bid_auto($bid_number,$id) {
    $data = array(
    'bid_status' => 'approved',
    'approval_date' => date('d F, Y'),
    );
    $this->db->where('id',$id);
    $this->db->where('bid_number',$bid_number);
    $query = $this->db->update('bids', $data);
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

  public function update_contract_where() {
    $this->db->set('status','completed');
    $this->db->where('contract_number',$this->input->post('bid_number'));
    $this->db->where('owner_email',$this->input->post('bid_by_email'));
    $query = $this->db->update('contracts');
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

public function check_bid_status($bid_number) {
$this->db->where('bid_number',$bid_number);
$query =  $this->db->get('bids');
if($query->num_rows() < 1) {
  return false;
} else {
    return true;
}
}

public function get_bids() {
$query =  $this->db->get('bids');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_contracts() {
$query =  $this->db->get('contract_bidding');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_properties_approved() {
  $this->db->where('auth !=','approved');
$query =  $this->db->get('for_sell');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_properties_pending() {
  $this->db->where('auth =','pending');
$query =  $this->db->get('for_sell');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_bid_where() {
  $this->db->where('id',$this->input->post('id'));
  $this->db->where('bid_by_email',$this->input->post('bid_by_email'));
$query =  $this->db->get('bids');
    return $query->row();
}
public function get_bids_avg($bid_number){
  $this->db->select('*');
  $this->db->where('bid_number',$bid_number);
  $this->db->order_by('bid_amount');
$query = $this->db->get('bids');
return $query->result_array();
}

public function get_bids_by($bid_number){
  $this->db->select('*');
  $this->db->where('bid_number',$bid_number);
$query = $this->db->get('bids');
return $query->result_array();
}

public function avg() {
  $this->db->select('*');
  $this->db->order_by('bid_amount');
$query = $this->db->get('bids');
return $query->result_array();
}
}
