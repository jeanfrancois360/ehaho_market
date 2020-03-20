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
        $this->load->helper('security');
        if (empty($_SESSION['cart_items'])) {
            $_SESSION['cart_items'] = array();
        }
        if (empty($_SESSION['wishlist_items'])) {
            $_SESSION['wishlist_items'] = array();
        }
        if (empty($_SESSION['compare_items'])) {
            $_SESSION['compare_items'] = array();
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
        $data_['total_rows'] =  $this->Food_model->count_list();
        $data_['uri_segment'] = $start;
        $data['categories'] = $this->Food_model->get_product_categories();
        $data['tags'] = $this->Food_model->get_product_tags();
        $data['buyer_orders'] = $this->Food_model->get_buyer_orders();
        $data['pre_harvest'] = $this->Food_model->get_pre_harvest();
        $data['provinces'] = $this->Food_model->all_provinces();
        $this->load->view('market/header', $data);
        $this->load->view('market/food_shop', $data_);
        $this->load->view('market/footer');
    }
    public function food_shop_by_category()
    {
        // Pagination Configuration Start
        $category = ($this->uri->segment(2) == "category") ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url()."shop/category/".$category;
        $config['total_rows'] = $this->Food_model->count_list_by_category($category);
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
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
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['content'] = $this->Food_model->get_all_food_by_category($start, $category);
        $data_['total_rows'] =  $this->Food_model->count_list_by_category($category);
        $data_['uri_segment'] = $start;
        $data['categories'] = $this->Food_model->get_product_categories();
        $data['tags'] = $this->Food_model->get_product_tags();
        $data['buyer_orders'] = $this->Food_model->get_buyer_orders();
        $data['pre_harvest'] = $this->Food_model->get_pre_harvest();
        $data['provinces'] = $this->Food_model->all_provinces();
        // var_dump($data);
        $this->load->view('market/header', $data);
        $this->load->view('market/food_shop', $data_);
        $this->load->view('market/footer');
    }
    public function food_shop_by_tag()
    {
        // Pagination Configuration Start
        $tag = ($this->uri->segment(2) == "tag") ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url()."shop/tag/".$tag;
        $config['total_rows'] = $this->Food_model->count_list_by_tag($tag);
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
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
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['content'] = $this->Food_model->get_all_food_by_tag($start, $tag);
        $data_['total_rows'] =  $this->Food_model->count_list_by_tag($tag);
        $data_['uri_segment'] = $start;
        $data['categories'] = $this->Food_model->get_product_categories();
        $data['tags'] = $this->Food_model->get_product_tags();
        $data['buyer_orders'] = $this->Food_model->get_buyer_orders();
        $data['pre_harvest'] = $this->Food_model->get_pre_harvest();
        $data['provinces'] = $this->Food_model->all_provinces();
        // var_dump($data);
        $this->load->view('market/header', $data);
        $this->load->view('market/food_shop', $data_);
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
    public function login()
    {
        $data['title'] = 'Ehaho - Login';
        $this->load->view('market/header', $data);
        $this->load->view('market/login');
        $this->load->view('market/footer');
    }
    public function register()
    {
        $data['title'] = 'Ehaho - Register';
        $data['provinces'] = $this->Food_model->all_provinces();
        $this->load->view('market/header', $data);
        $this->load->view('market/register');
        $this->load->view('market/footer');
    }
    public function wishlist()
    {
        $data['title'] = 'Ehaho - Wishlist';
        $this->load->view('market/header', $data);
        $this->load->view('market/wishlist');
        $this->load->view('market/footer');
    }
    public function my_orders()
    {
        $data['title'] = 'Ehaho - My Orders';
        $this->load->view('market/header', $data);
        $this->load->view('market/myOrders');
        $this->load->view('market/footer');
    }
    public function get_single_buyer_orders()
    {
        $results = $this->Food_model->get_single_buyer_orders($this->session->user_id);
        echo json_encode($results);
    }
    public function order_info()
    {
        $id = $this->input->post('id');
        $results = $this->Food_model->order_info($id);
        echo json_encode($results);
    }
    public function order_offers()
    {
        $id = $this->input->post('id');
        $results = $this->Food_model->order_offers($id);
        echo json_encode($results);
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
    public function add_to_wishlist($market_id = "")
    {
        if (isset($_POST['market_id'])) {
            $market_id = $_POST['market_id'];
            if (empty($_SESSION['cart_items'])) {
                $_SESSION['wishlist_items'] = array();
            }
            if (!in_array($market_id, $_SESSION['wishlist_items'])) {
                array_push($_SESSION['wishlist_items'], $market_id);
            }
            echo json_encode($_SESSION['wishlist_items']);
        }
    }
    public function add_to_compare($market_id = "")
    {
        if (isset($_POST['market_id'])) {
            $market_id = $_POST['market_id'];
            if (empty($_SESSION['compare_items'])) {
                $_SESSION['compare_items'] = array();
            }
            if (!in_array($market_id, $_SESSION['compare_items'])) {
                array_push($_SESSION['compare_items'], $market_id);
            }
            echo json_encode($_SESSION['compare_items']);
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
    public function removeWishlistItem()
    {
        $id = $_POST['id'];
        $key = array_search($id, $_SESSION['wishlist_items']);
        unset($_SESSION['wishlist_items'][$key]);
    }
    public function removeCompareItem()
    {
        $id = $_POST['id'];
        $key = array_search($id, $_SESSION['compare_items']);
        unset($_SESSION['compare_items'][$key]);
    }
    public function compare()
    {
        $data['title'] = 'Ehaho - Product Comparison';
        $this->load->view('market/header', $data);
        $this->load->view('market/compare');
        $this->load->view('market/footer');
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
    public function clear_compare()
    {
        $_SESSION['compare_items'] = array();
        echo "compare is empty!!!";
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
            $response['successes'] = null;
            $response['is_user_new'] = null;
            echo json_encode($response);
            return;
        }
        if ($payment_cash == 1 || $payment_mobile == 1 || $payment_paypal == 1) {
            1 == 1;
        } else {
            $response['errors'] = "No Payment Method Selected";
            $response['successes'] = null;
            $response['is_user_new'] = null;
            echo json_encode($response);
            return;
        }
        if ($terms != 1) {
            $response['errors'] = "Accept license Agreement";
            $response['successes'] = null;
            $response['is_user_new'] = null;
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
        if ($this->session->loggedIn == true) {
            $this->form_validation->set_rules('names', 'Names', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'phone number', 'required|exact_length[10]');
            $this->form_validation->set_rules('identity', 'national id', 'required|exact_length[16]');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('province', 'province', 'required');
            $this->form_validation->set_rules('district', 'district', 'required');
            $this->form_validation->set_rules('sector', 'sector', 'required');
            $this->form_validation->set_rules('cell', 'cell', 'required');
            $this->form_validation->set_rules('village', 'village', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('confirm', 'password confirmation', 'required|matches[password]');
            if ($this->input->post('new_address') == 1) {
                $this->form_validation->set_rules('names2', 'New shipping Names', 'required|min_length[3]');
                $this->form_validation->set_rules('email2', 'New Shipping Email', 'required|valid_email');
                $this->form_validation->set_rules('phone2', 'New Shipping phone number', 'required|exact_length[10]');
                $this->form_validation->set_rules('identity2', 'New Shipping National id', 'required|exact_length[16]');
                $this->form_validation->set_rules('country2', 'New Shipping Country', 'required');
                $this->form_validation->set_rules('province2', 'New Shipping Province', 'required');
                $this->form_validation->set_rules('district2', 'New Shipping District', 'required');
                $this->form_validation->set_rules('sector2', 'New Shipping Sector', 'required');
                $this->form_validation->set_rules('cell2', 'New Shipping Cell', 'required');
                $this->form_validation->set_rules('village2', 'New Shipping Village', 'required');
            }
            if ($this->form_validation->run() === false) {
                //set the validation errors in flashdata (one time session)
                $this->session->set_flashdata('errors', validation_errors());
                $response['errors'] = validation_errors()."<br />Error.........";
                $response['successes'] = null;
                $response['is_user_new'] = null;
                echo json_encode($response);
            } elseif ($this->form_validation->run() == true) {
                $shipping_address = 0;
                if ($this->input->post('new_address') == 1) {
                    $shipping_info = array(
                      'names' =>$this->input->post('names2'),
                      'email' => $this->input->post('email2'),
                      'phone' => $this->input->post('phone2'),
                      'national_id' => $this->input->post('identity2'),
                      'country' => $this->input->post('country2'),
                      'province' => $this->input->post('province2'),
                      'district' => $this->input->post('district2'),
                      'sector' => $this->input->post('sector2'),
                      'cell' => $this->input->post('cell2'),
                      'village' => $this->input->post('village2'),
                      'type' => "Food",
                      'deleted' => 'No'
                    );
                    $shipping_address = $this->Food_model->add_shipping_address($shipping_info);
                }
                $add_order = 0;
                $userId = $this->session->user_id;
                foreach ($order as $order) {
                    $data = array(
                        'order_id' => "PR/".time(),
                        'user_id' => "$userId",
                        'buyer_seller_id' => $order['buyer_seller_id'],
                        'product_id' => $order['product_id'],
                        'variety_id' => $order['variety'],
                        'unit' => $order['unit'],
                        'quantity' => $order['qty'],
                        'price' => $order['total_price'],
                        'subtotal' => $order['subtotal'],
                        'balance' => 0,
                        'zone_area' => 2,
                        'status' => 'Pending',
                        'market_p_id' => $order['market_id'],
                        'payment_method' => $payment_method,
                        'shipping_address' => $shipping_address
                      );
                    array_push($order_data, $data);
                }
                $add_order = $this->Food_model->add_user_order($order_data);
                if ($add_order > 0) {
                    $_SESSION['cart_items'] = array();
                    $response['errors'] = null;
                    $response['is_user_new'] = 0;
                    $response['successes'] = "Order has been Successfully Made";
                    echo json_encode($response);
                } else {
                    $response['errors'] = "ordering failed. please try again!!";
                    $response['successes'] = null;
                    $response['is_user_new'] = null;
                    echo json_encode($response);
                }
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
                $response['successes'] = null;
                $response['is_user_new'] = null;
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
                if ($user_id > 0 && $userId > 0) {
                    $session_data = array(
                      "names" => $this->input->post('names'),
                      "email" => $this->input->post('email'),
                      "phone" => $this->input->post('phone'),
                      "national_id" => $this->input->post('national_id'),
                      "province" => $this->Food_model->get_province($this->input->post('province')),
                      'district' => $this->Food_model->get_district($this->input->post('district')),
                      'sector' => $this->Food_model->get_sector($this->input->post('sector')),
                      'cell' => $this->Food_model->get_cell($this->input->post('cell')),
                      'village' => $this->Food_model->get_village($this->input->post('village')),
                      "user_id" => $userId,
                      "loggedIn" => true
                    );
                }

                $shipping_address = 0;
                if ($this->input->post('new_address') == 1) {
                    $shipping_info = array(
                      'names' =>$this->input->post('names2'),
                      'email' => $this->input->post('email2'),
                      'phone' => $this->input->post('phone2'),
                      'national_id' => $this->input->post('identity2'),
                      'country' => $this->input->post('country2'),
                      'province' => $this->input->post('province2'),
                      'district' => $this->input->post('district2'),
                      'sector' => $this->input->post('sector2'),
                      'cell' => $this->input->post('cell2'),
                      'village' => $this->input->post('village2'),
                      'type' => "Food",
                      'deleted' => 'No'
                    );
                    $shipping_address = $this->Food_model->add_shipping_address($shipping_info);
                }

                //user order processing
                $add_order;
                foreach ($order as $order) {
                    $data = array(
                      'order_id' => "PR/".time(),
                      'user_id' => "$userId",
                      'buyer_seller_id' => $order['buyer_seller_id'],
                      'product_id' => $order['product_id'],
                      'variety_id' => $order['variety'],
                      'unit' => $order['unit'],
                      'quantity' => $order['qty'],
                      'price' => $order['total_price'],
                      'subtotal' => $order['subtotal'],
                      'balance' => 0,
                      'zone_area' => 2,
                      'status' => 'Pending',
                      'market_p_id' => $order['market_id'],
                      'payment_method' => $payment_method,
                      'shipping_address' => $shipping_address
                    );
                    array_push($order_data, $data);
                }
                $add_order = $this->Food_model->add_user_order($order_data);
                if ($add_order > 0) {
                    $_SESSION['cart_items'] = array();
                    $response['errors'] = null;
                    $response['is_user_new'] = 1;
                    $response['successes'] = "Order has been Successfully Made";
                    $this->session->set_userdata($session_data);
                    echo json_encode($response);
                } else {
                    $response['errors'] = "ordering failed. please try again!!";
                    $response['successes'] = null;
                    $response['is_user_new'] = null;
                    echo json_encode($response);
                }
            }
        }
    }
    public function login_process()
    {
        $this->form_validation->set_rules('user', 'Phone or Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $response['errors'] = validation_errors();
            $response['successes'] = null;
            $response['loggedIn'] = false;
            echo json_encode($response);
        } else {
            $data = array('user' => $this->input->post('user'),'password' => md5($this->input->post('password')));
            $check = $this->Food_model->user_auth($data);
            if ($check['loggedIn'] == true) {
                $session_data_ = array(
                "names" => $check['names'],
                "email" => $check['email'],
                "phone" => $check['phone'],
                "national_id" => $check['national_id'],
                "province" => $this->Food_model->get_province($check['province']),
                "district" => $this->Food_model->get_district($check['district']),
                "sector" => $this->Food_model->get_sector($check['sector']),
                "cell" => $this->Food_model->get_cell($check['cell']),
                "village" => $this->Food_model->get_village($check['village']),
                "user_id" => $check['user_id'],
                "loggedIn" => true
              );
                $this->session->set_userdata($session_data_);
                $response['errors'] = null;
                $response['successes'] = "Logged In Successfully!! Wait while redirecting....";
                $response['loggedIn'] = $check['loggedIn'];
                echo json_encode($response);
            } else {
                $response['errors'] = "Invalid Login, Please try again!!";
                $response['successes'] = null;
                $response['loggedIn'] = $check['loggedIn'];
                echo json_encode($response);
            }
        }
    }
    public function register_process()
    {
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
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $response['errors'] = validation_errors();
            $response['successes'] = null;
            $response['is_user_new'] = null;
            $response['loggedIn'] = false;
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
            if ($user_id > 0 && $userId > 0) {
                $session_data__ = array(
                  "names" => $this->input->post('names'),
                  "email" => $this->input->post('email'),
                  "phone" => $this->input->post('phone'),
                  "national_id" => $this->input->post('identity'),
                  "province" => $this->Food_model->get_province($this->input->post('province')),
                  'district' => $this->Food_model->get_district($this->input->post('district')),
                  'sector' => $this->Food_model->get_sector($this->input->post('sector')),
                  'cell' => $this->Food_model->get_cell($this->input->post('cell')),
                  'village' => $this->Food_model->get_village($this->input->post('village')),
                  "user_id" => $userId,
                  "loggedIn" => true
                );
                $response['errors'] = null;
                $response['is_user_new'] = 1;
                $response['successes'] = "You have been registered and Logged In Successfully!! Redirecting in While ...........";
                $response['loggedIn'] = true;
                $this->session->set_userdata($session_data__);
                echo json_encode($response);
            }
        }
    }
    public function supplier_offer()
    {
        $this->form_validation->set_rules('names', 'Names', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|exact_length[10]');
        $this->form_validation->set_rules('identity', 'National id', 'required|exact_length[16]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('sector', 'Sector', 'required');
        $this->form_validation->set_rules('cell', 'Cell', 'required');
        $this->form_validation->set_rules('village', 'Village', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required');
        $this->form_validation->set_rules('order_id', 'Order Id', 'required');
        $this->form_validation->set_rules('delivery_date', 'Delivery Date', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $response['errors'] = validation_errors();
            $response['successes'] = null;
            $response['is_user_new'] = null;
            $response['loggedIn'] = false;
            echo json_encode($response);
        } else {
            $offer_data = array(
          'names' =>$this->input->post('names'),
          'national_id' => $this->input->post('identity'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'country' => $this->input->post('country'),
          'province' => $this->input->post('province'),
          'district' => $this->input->post('district'),
          'sector' => $this->input->post('sector'),
          'cell' => $this->input->post('cell'),
          'village' => $this->input->post('village'),
          'order_id' => $this->input->post('order_id'),
          'offer_quantity' => $this->input->post('qty'),
          'unit_price' => $this->input->post('unit_price'),
          'delivery_date' => $this->input->post('delivery_date'),
          'comment' => $this->input->post('comment'),
          'status' => "Pending",
          'deleted' => "No"
        );
            $offer_id = $this->Food_model->add_supplier_offer($offer_data);
            if ($offer_id > 0) {
                $response['errors'] = null;
                $response['is_user_new'] = null;
                $response['successes'] = "Offer Received Successfully!!";
                echo json_encode($response);
            } else {
                $response['errors'] = "Offer Failed. Try Again!!";
                $response['is_user_new'] = null;
                $response['successes'] = null;
                echo json_encode($response);
            }
        }
    }
    public function pre_order()
    {
        $this->form_validation->set_rules('names', 'Names', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|exact_length[10]');
        $this->form_validation->set_rules('identity', 'National id', 'required|exact_length[16]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('sector', 'Sector', 'required');
        $this->form_validation->set_rules('cell', 'Cell', 'required');
        $this->form_validation->set_rules('village', 'Village', 'required');
        $this->form_validation->set_rules('prediction_id', 'Prediction Id', 'required');
        $this->form_validation->set_rules('delivery_date', 'Delivery Date', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $response['errors'] = validation_errors();
            $response['successes'] = null;
            $response['is_user_new'] = null;
            $response['loggedIn'] = false;
            echo json_encode($response);
        } else {
            $order_data = array(
          'names' =>$this->input->post('names'),
          'identity' => $this->input->post('identity'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'country' => $this->input->post('country'),
          'province' => $this->input->post('province'),
          'district' => $this->input->post('district'),
          'sector' => $this->input->post('sector'),
          'cell' => $this->input->post('cell'),
          'village' => $this->input->post('village'),
          'prediction_id' => $this->input->post('prediction_id'),
          'quantity' => $this->input->post('qty'),
          'delivery_date' => $this->input->post('delivery_date'),
          'comment' => $this->input->post('comment'),
          'status' => "Pending",
          'deleted' => "No"
        );
            $pre_order_id = $this->Food_model->pre_order($order_data);
            if ($pre_order_id > 0) {
                $response['errors'] = null;
                $response['is_user_new'] = null;
                $response['successes'] = "Pre-order made Successfully!!";
                echo json_encode($response);
            } else {
                $response['errors'] = "Pre-order Failed. Try Again!!";
                $response['is_user_new'] = null;
                $response['successes'] = null;
                echo json_encode($response);
            }
        }
    }
    public function offer_action()
    {
        $id = $this->input->post('offer_id');
        $status = $this->input->post('status');
        $res = $this->Food_model->offer_update($id, $status);
        return $res;
    }
    public function update_supplied()
    {
        $id = $this->input->post('id');
        $toUpdate = $this->input->post('toUpdate');
        echo $this->Food_model->update_supplied($id, $toUpdate);
    }
    public function logout()
    {
        //unset the logged_in session and redirect to login page
        $session_data = array('names','email', 'phone','loggedIn');
        $this->session->unset_userdata($session_data);
        redirect(base_url().'shop');
    }
}
