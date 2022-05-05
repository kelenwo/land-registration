<?php
Class User_model Extends CI_model {

public function auth($email) {
  $this->db->where('email',$email);
  $query = $this->db->get('users');
  if($query->num_rows() > 0) {
  return $query->row();
  }
  else {
    return false;
  }
}
  public function login() {
$this->db->where('email',$this->input->post('email'));
$query = $this->db->get('users');
if($query->num_rows() > 0) {
/* If registration number exists,verify the access code */
return $query->row();
}
else {
//Return false if user doesnt exist
  return false;
}
}

    public function save_user($code) {
$data = array(
  'name' => $this->input->post('name'),
  'email' => $this->input->post('email'),
  'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
  'date' => date("d-M-Y"),
  'auth' => password_hash($code,PASSWORD_DEFAULT),
  'phone' => $this->input->post('phone'),
  'rights' => 0,
  'points' => 10,
  'account_state' => 'pending',
);
$query = $this->db->insert('users',$data);
if($query) {
  return true;
} else {
  return mysqli_error();
}
    }

    public function update_user_auth() {
      $data = array(
        'rights' => 1,
        'account_state' => 'subscriber',
      );
    $this->db->where('email',$this->input->post('email'));
    $query = $this->db->update('users', $data);
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
}

public function update_user() {
  $this->db->where('id',$this->input->post('id'));
$query = $this->db->update('users', $this->input->post());
if($query) {
  return true;
} else {
  return false;
}

}
public function get_user() {
  $query = $this->db->get('users');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_biodata() {
$this->db->select('*');
$this->db->where('email',$this->session->email);
$query = $this->db->get('users');
return $query->row();
}

public function get_biodat() {
$this->db->select('*');
$this->db->where('email',$this->session->email);
$query = $this->db->get('users');
return $query->result_array();
}

public function get_userdata($user) {
$this->db->select('*');
$this->db->where('email',$user);
$query = $this->db->get('users');
return $query->result_array();
}


public function verify() {
$this->db->where('email',$this->input->post('email'));
$query =  $this->db->get('users');
if($query->num_rows() < 1) {
  return false;
} else {
    return true;
}
}

}
