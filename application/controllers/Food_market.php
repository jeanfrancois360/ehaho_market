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
        $data['title'] = 'Ehaho - Welcome';
        $this->load->view('market/index.php', $data);
    }
    public function food_shop()
    {
        $data['title'] = 'Ehaho - Shop';
        $data['content'] = $this->Food_model->get_all_food();
        // var_dump($data);
        $this->load->view('market/food_shop.php', $data);
    }
    public function cart()
    {
        $data['title'] = 'Ehaho - Shopping Cart';
        $this->load->view('market/cart', $data);
    }
    public function checkout()
    {
        $data['title'] = 'Ehaho - Checkout';
        $this->load->view('market/checkout', $data);
    }
    public function wishlist()
    {
        $data['title'] = 'Ehaho - Wishlist';
        $this->load->view('market/wishlist', $data);
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
    public function removeItem()
    {
        $id = $_POST['id'];
        $key = array_search($id, $_SESSION['cart_items']);
        unset($_SESSION['cart_items'][$key]);
    }
    public function compare()
    {
        $data['title'] = 'Ehaho - Product Comparison';
        $this->load->view('market/compare', $data);
    }
}
