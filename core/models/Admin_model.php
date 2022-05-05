<?php
Class Admin_model Extends CI_model {


public function get_events() {
  $query = $this->db->get('events');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_events_limit() {
  $this->db->where('owner','ePROCLOUD');
  $this->db->limit(3);
  $this->db->order_by('event_date', 'DESC');
  $query = $this->db->get('events');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function save_event() {
  $query = $this->db->insert('events', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function update_event() {
  $this->db->where('id', $this->input->post('id'));
  $query = $this->db->update('events', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function get_biodata() {
$this->db->select('*');
$this->db->where('id',$this->input->post('id'));
$query = $this->db->get('users');
return $query->row();
}

public function get_payments() {
  $this->db->where('status','paid');
  $query = $this->db->get('payments');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_news() {
$query =  $this->db->get('news');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function update_news() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('news', $this->input->post());
  if($query) {
    return true;
  } else {
    return false;
  }
}

public function publish_news() {
  $query = $this->db->insert('news', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function count_users() {
$this->db->select('*');
$this->db->from('users');
return $this->db->count_all_results();
}
public function count_contracts() {
$this->db->select('*');
$this->db->from('contract_bidding');
return $this->db->count_all_results();
}
public function count_contracts_pending() {
$this->db->where('bid_status','pending');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}
public function count_contracts_approved() {
$this->db->where('bid_status','approved');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}
public function count_contracts_active() {
$this->db->where('contract_status','active');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}

public function count_new_approved() {
$this->db->where('bid_status','approved');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}

public function update_article() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('articles', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}
}
