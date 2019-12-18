<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputs_market extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      // Load the model
      $this->load->model('Inputs_Model');
    }
    public function inputs(){
      $data['page_title'] = "E-haho";
      $data['total_inputs'] = $this->Inputs_Model->count_inputs();
      $data['inputs_content'] = $this->Inputs_Model->fetch_inputs();
      $this->load->view('market/inputs_shop.php', $data);
    }
    public function checkout(){
        $this->load->view('market/inputs_checkout.php');
    }
    public function cart(){
        $this->load->view('market/inputs_cart.php');
    }
    public function wishlist(){
        $this->load->view('market/inputs_wishlist.php');
    }
    public function compare(){
        $this->load->view('market/inputs_compare.php');
    }
  

}
?>