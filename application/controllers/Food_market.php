<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food_market extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Food_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        if (empty($_SESSION['cart_items'])) {
            $_SESSION['cart_items'] = array();
        }
    }
    public function index()
    {
        $data['title'] = 'Ehaho - Welcome';
        $this->load->view('market/index.php', $data);
    }
    public function food_shop()
    {
        // Pagination Configuration Start
        $config['base_url'] = base_url()."shop";
        $config['total_rows'] = $this->Food_model->count_list();
        $config['per_page'] = 12;
        $config['uri_segment'] = 2;
        $config['full_tag_open'] = '<div class="pagination-content text-center"><ul>';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        // Pagination Configuration End

        $data['title'] = 'Ehaho - Shop';
        $start = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['content'] = $this->Food_model->get_all_food($start);
        // var_dump($data);
        $this->load->view('market/header', $data);
        $this->load->view('market/food_shop.php');
        $this->load->view('market/footer');
    }
    public function cart()
    {
        $data['title'] = 'Ehaho - Shopping Cart';
        $this->load->view('market/header', $data);
        $this->load->view('market/cart');
        $this->load->view('market/footer');
    }
    public function checkout()
    {
        $data['title'] = 'Ehaho - Checkout';
        $data['provinces'] = $this->Food_model->all_provinces();
        $this->load->view('market/header', $data);
        $this->load->view('market/checkout');
        $this->load->view('market/footer');
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
    public function show_single_cart()
    {
        $market_id = $_POST['market_id'];
        echo $this->Food_model->show_single_cart($market_id);
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
    public function get_districts()
    {
        $cat=$this->input->post('name');
        $table='district';
        $where=array('province_id' => $cat);
        $data['districts']=$this->Food_model->all_location($table, $where);
        $sc=json_encode($data['districts']);
        echo $sc;
    }
    public function get_sectors()
    {
        $cat=$this->input->post('name');
        $table='sector';
        $where=array('district_id' => $cat);
        $data['sectors']=$this->Food_model->all_location($table, $where);
        $sc=json_encode($data['sectors']);
        echo $sc;
    }
    public function get_cells()
    {
        $cat=$this->input->post('name');
        $table='cell';
        $where=array('sector_id' => $cat);
        $data['cells']=$this->Food_model->all_location($table, $where);
        $sc=json_encode($data['cells']);
        echo $sc;
    }
    public function get_villages()
    {
        $cat=$this->input->post('name');
        $table='village';
        $where=array('cell_id' => $cat);
        $data['villages']=$this->Food_model->all_location($table, $where);
        $sc=json_encode($data['villages']);
        echo $sc;
    }
    public function checkout_process()
    {
        $order = array();
        $order = json_decode(json_encode(json_decode($this->input->post('order'))), true);
        $payment_method = '';
        $payment_cash = $this->input->post('payment_cash');
        $payment_paypal = $this->input->post('payment_paypal');
        $payment_mobile = $this->input->post('payment_mobile');
        $terms = $this->input->post('terms');
        if (empty($order)) {
            $response['errors'] = "Cart is Empty";
            $response['success'] = null;
            echo json_encode($response);
            return;
        }
        if ($payment_cash == 1 || $payment_mobile == 1 || $payment_paypal == 1) {
            1 == 1;
        } else {
            $response['errors'] = "No Payment Method Selected";
            $response['success'] = null;
            echo json_encode($response);
            return;
        }
        if ($terms != 1) {
            $response['errors'] = "Accept license Agreement";
            $response['success'] = null;
            echo json_encode($response);
            return;
        }
        if ($payment_cash == 1) {
            $payment_method = "OnDelivery";
        } elseif ($payment_mobile == 1) {
            $payment_method = "MobileMoney";
        } elseif ($payment_paypal == 1) {
            $payment_method = "CreditCard";
        }
        $response = array();
        $order_data = array();
        if ($this->session->userdata('logged_in')) {
            if ($this->input->post('new_address')===1) {
                $this->form_validation->set_rules('names2', 'Names', 'required|min_length[3]');
                $this->form_validation->set_rules('email2', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('phone2', 'phone number', 'required|exact_length[10]');
                $this->form_validation->set_rules('identity2', 'national id', 'required|exact_length[16]');
                $this->form_validation->set_rules('country2', 'country', 'required');
                $this->form_validation->set_rules('province2', 'province', 'required');
                $this->form_validation->set_rules('district2', 'district', 'required');
                $this->form_validation->set_rules('sector2', 'sector', 'required');
                $this->form_validation->set_rules('cell2', 'cell', 'required');
                $this->form_validation->set_rules('village2', 'village', 'required');
            }
        } else {
            $this->form_validation->set_rules('names', 'Names', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[buyer_seller.email]');
            $this->form_validation->set_rules('phone', 'phone number', 'required|exact_length[10]|is_unique[users.username]');
            $this->form_validation->set_rules('identity', 'national id', 'required|exact_length[16]');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('province', 'province', 'required');
            $this->form_validation->set_rules('district', 'district', 'required');
            $this->form_validation->set_rules('sector', 'sector', 'required');
            $this->form_validation->set_rules('cell', 'cell', 'required');
            $this->form_validation->set_rules('village', 'village', 'required');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[3]|max_length[10]');
            $this->form_validation->set_rules('confirm', 'password confirmation', 'required|matches[password]');
            if ($this->input->post('new_address')==1) {
                $this->form_validation->set_rules('names2', 'New shipping Names', 'required|min_length[3]');
                $this->form_validation->set_rules('email2', 'New shipping Email', 'required|valid_email');
                $this->form_validation->set_rules('phone2', 'New shipping phone number', 'required|exact_length[10]');
                $this->form_validation->set_rules('identity2', 'New shipping national id', 'required|exact_length[16]');
                $this->form_validation->set_rules('country2', 'New shipping country', 'required');
                $this->form_validation->set_rules('province2', 'New shipping province', 'required');
                $this->form_validation->set_rules('district2', 'New shipping district', 'required');
                $this->form_validation->set_rules('sector2', 'New shipping sector', 'required');
                $this->form_validation->set_rules('cell2', 'New shipping cell', 'required');
                $this->form_validation->set_rules('village2', 'New shipping village', 'required');
            }
            if ($this->form_validation->run() == false) {
                //set the validation errors in flashdata (one time session)
                $this->session->set_flashdata('errors', validation_errors());
                $response['errors'] = validation_errors();
                $response['success'] = null;
                echo json_encode($response);
            } else {
                $credentials = array(
              'username' => $this->input->post('phone'),
              'password' => md5($this->input->post('password')),
              'role' => 'Customer',
              'status' => 'Active'
            );
                $user_id= $this->Food_model->add_user_credential($credentials);
                $user_data = array(
                  'user_id' => $user_id,
                  'name' =>$this->input->post('names'),
                  'national_id' => $this->input->post('identity'),
                  'phone' => $this->input->post('phone'),
                  'email' => $this->input->post('email'),
                  'province' => $this->input->post('province'),
                  'district' => $this->input->post('district'),
                  'sector' => $this->input->post('sector'),
                  'cell' => $this->input->post('cell'),
                  'village' => $this->input->post('village'),
                  'role' => 'Customer',
                  'status' => 'Active',
                  'agent_id' => 0,
                  'about' => null,
                  'photo' => null,
                  'message' => 'No'
                );
                $userId = $this->Food_model->add_user_data($user_data);
                $add_order;
                foreach ($order as $order) {
                    $data = array(
                      'order_id' => "PR/".time(),
                      'user_id' => "$userId",
                      'buyer_seller_id' => $order['buyer_seller_id'],
                      'product_id' => $order['product_id'],
                      'variety_id' => $order['variety'],
                      'quantity' => $order['qty'],
                      'price' => $order['total_price'],
                      'subtotal' => $order['subtotal'],
                      'balance' => 0,
                      'zone_area' => 2,
                      'status' => 'Pending',
                      'market_p_id' => $order['market_id'],
                      'payment_method' => $payment_method
                    );
                    array_push($order_data, $data);
                }
                $add_order = $this->Food_model->add_user_order($order_data);
                if ($add_order > 0) {
                    $_SESSION['cart_items'] = array();
                    $response['errors'] = null;
                    $response['successes'] = "Order has been Successfully Made";
                    echo json_encode($response);
                } else {
                    $response['errors'] = "ordering failed. please try again!!";
                    $response['successes'] = null;
                    echo json_encode($response);
                }
            }
        }
    }
}
