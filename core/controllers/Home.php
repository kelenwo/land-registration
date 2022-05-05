<?php
Class Home Extends CI_Controller {

  public function index() {
    $data['title'] = "ePROCLOUD - HOME";
    $data['properties'] = $this
        ->main_model
        ->get_properties_all();
    $this->parser->parse('home/head',$data);
    $this->parser->parse('home/index',$data);
    $this->load->view('home/end');
  }
  public function properties() {
    $data['properties'] = $this
        ->main_model
        ->get_properties_all();
    $data['title'] = "ePROCLOUD - Properties";
    $this->parser->parse('home/head',$data);
    $this->parser->parse('home/product',$data);
    $this->load->view('home/end');
  }

  public function property_details($id) {
    $data = get_object_vars($this->main_model->get_property_single($id));
    $data['titles'] = "ePROCLOUD - Product details";
    $this->parser->parse('home/head',$data);
    $this->parser->parse('home/product_main',$data);
    $this->load->view('home/end');
  }


  public function contact() {
    $data['title'] = "PROCLOUD - HOME";
    $this->parser->parse('home/head',$data);
    $this->parser->parse('home/contact',$data);
    $this->load->view('home/end');
  }
  public function send_message() {
  $msg = $this->main_model->send_message();
  if($msg==true) {
  echo 'true';
  } else {
  echo $msg;}
  }

}
