<?php
Class Main_model Extends CI_model {

//Contracts start
  public function publish_property() {
    $query = $this->db->insert('for_sell', $this->input->post());
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

  public function update_contract() {
    $this->db->where('id',$this->input->post('id'));
    $query = $this->db->update('contracts', $this->input->post());
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

public function get_properties() {
$this->db->where('author_email',$this->session->email);
$query =  $this->db->get('for_sell');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_properties_all() {
$query =  $this->db->get('for_sell');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_property_single($id) {
$this->db->where('id',$id);
$query =  $this->db->get('for_sell');
return $query->row();
}

public function get_properties_approved($email) {
$this->db->where('status','approved');
$this->db->where('author_email',$email);
$query =  $this->db->get('for_sell');
return $query->result_array();
}

public function get_properties_pending($email) {
$this->db->where('status','pending');
$this->db->where('author_email',$email);
$query =  $this->db->get('for_sell');
return $query->result_array();
}


public function get_contract_number() {
$this->db->where('owner_email',$this->session->email);
$this->db->where('contract_title',$this->input->post('contract_title'));
$this->db->select('contract_number');
$this->db->from('contracts');
$query = $this->db->get();
return $query->row();
}

//Contracts end

//Event start
public function get_events() {
$this->db->where('owner_email',$this->session->email);
$query =  $this->db->get('events');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function publish_event() {
  $arr = $this->input->post();
  $query = $this->db->insert('events', $arr);
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function update_event() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('events', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}
//Event end

//Business Partners
public function get_partners() {
$this->db->where('owner_email',$this->session->email);
$query =  $this->db->get('partners');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function publish_partner() {
  $arr = $this->input->post();
  $query = $this->db->insert('partners', $arr);
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function update_partner() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('partners', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

//Bidding start
public function get_contracts_where($bid_number) {
$this->db->where('bid_number',$bid_number);
$query =  $this->db->get('contract_bidding');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->row();
}
}

public function get_approved_bids() {
$this->db->where('bid_by_email',$this->session->email);
$this->db->where('bid_status !=','pending');
$query =  $this->db->get('bids');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_bids() {
$this->db->where('bid_by_email',$this->session->email);
$this->db->where('bid_status','pending');
$query =  $this->db->get('bids');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function placebid() {
  $query = $this->db->insert('bids', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function update_bidd() {
  $this->db->where('id',$this->input->post('id'));
  $this->db->where('bid_by_email',$this->input->post('bid_by_email'));
  $this->db->set('contract_status', 'active');
  $this->db->update('bids');
}

public function update_contract_bid() {
  $this->db->where('bid_number',$this->input->post('contract_number'));
  $this->db->where('bid_by_email',$this->input->post('owner_email'));
  $this->db->set('contract_status',$this->input->post('status'));
  $this->db->set('end_date',$this->input->post('end_date'));
  $query = $this->db->update('bids');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}
//Bidding end


public function get_contracts_new() {
  $this->db->order_by('id','DESC');
  $this->db->limit(1);
  $query = $this->db->get('contract_bidding');
  if($query->num_rows() < 1) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_events_where() {
  $this->db->where('owner_email',$this->session->email);
  $this->db->order_by('event_date','DESC');
  $this->db->limit(1);
  $query = $this->db->get('events');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}
public function get_events_limit() {
  $this->db->where('owner','ePROCLOUD');
  $this->db->order_by('event_date','DESC');
  $this->db->limit(1);
  $query = $this->db->get('events');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}
public function count_contracts() {
$this->db->where('owner_email',$this->session->email);
$this->db->select('*');
$this->db->from('contracts');
return $this->db->count_all_results();
}
public function count_contracts_pending() {
$this->db->where('bid_by_email',$this->session->email);
$this->db->where('bid_status','pending');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}
public function count_contracts_finished() {
$this->db->where('bid_by_email',$this->session->email);
$this->db->where('has_finished','completed');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}
public function count_contracts_approved() {
$this->db->where('bid_by_email',$this->session->email);
$this->db->where('bid_status','approved');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
}
public function count_contracts_active() {
$this->db->where('bid_by_email',$this->session->email);
$this->db->where('contract_status','active');
$this->db->select('*');
$this->db->from('bids');
return $this->db->count_all_results();
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


public function send_message() {
  $query = $this->db->insert('contacts', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function delete_item() {
  $type = $this->input->post('type');

  if($type=="contract_bidding") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('contract_bidding');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}   elseif($type=="contract") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('contracts');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}   elseif($type=="event") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('events');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}  elseif($type=="news") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('news');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}  elseif($type=="users") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('users');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}
  elseif($type=="partners") {
    $this->db->where('id',$this->input->post('id'));
    $query = $this->db->delete('partners');
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
}
}

}
