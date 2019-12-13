<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food_market extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Food_model');
    }
    public function index()
    {
        $this->load->view('market/index.php');
    }
    public function food_shop()
    {
        $data['content'] = $this->Food_model->get_all_food();
        // var_dump($data);
        $this->load->view('market/food_shop.php', $data);
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
    public function add_to_cart($market_id = "")
    {
        if (isset($_POST['market_id'])) {
            $market_id = $_POST['market_id'];
            if (empty($_SESSION['cart_items'])) {
                $_SESSION['cart_items'] = array();
            }
            if (!in_array($market_id, $_SESSION['cart_items'])) {
                array_push($_SESSION['cart_items'], $market_id);
            }
            echo json_encode($_SESSION['cart_items']);
        }
    }
    public function show_cart()
    {
        echo $this->Food_model->show_cart();
    }
}
