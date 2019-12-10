<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food_market extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('market/index.php');
    }
    public function shop()
    {
        $this->load->view('market/shop.php');
    }
    public function cart()
    {
        $this->load->view('market/cart');
    }
    public function checkout()
    {
        $this->load->view('market/checkout');
    }
    public function wishlist()
    {
        $this->load->view('market/wishlist');
    }
}
