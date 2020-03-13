<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputs_market extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      // Load the model
      $this->load->model('Inputs_Model');
      // Load validations
      $this->load->library('form_validation');
        if (empty($_SESSION['inputs_cart_items'])) {
            $_SESSION['inputs_cart_items'] = array();
        }
    }
    
    public function get_districts()
    {
        $cat=$this->input->post('name');
        $table='district';
        $where=array('province_id' => $cat);
        $data['districts']=$this->Inputs_Model->all_location($table, $where);
        $sc=json_encode($data['districts']);
        echo $sc;
    }
    public function get_sectors()
    {
        $cat=$this->input->post('name');
        $table='sector';
        $where=array('district_id' => $cat);
        $data['sectors']=$this->Inputs_Model->all_location($table, $where);
        $sc=json_encode($data['sectors']);
        echo $sc;
    }
    public function get_cells()
    {
        $cat=$this->input->post('name');
        $table='cell';
        $where=array('sector_id' => $cat);
        $data['cells']=$this->Inputs_Model->all_location($table, $where);
        $sc=json_encode($data['cells']);
        echo $sc;
    }
    public function get_villages()
    {
        $cat=$this->input->post('name');
        $table='village';
        $where=array('cell_id' => $cat);
        $data['villages']=$this->Inputs_Model->all_location($table, $where);
        $sc=json_encode($data['villages']);
        echo $sc;
    }
    
    
    
    public function inputs($id = 0){
      
        $data['page_title'] = "E-haho";
        $data['inputs_content'] = $this->Inputs_Model->fetch_inputs($id);
        $this->load->view('market/inputs_shop.php', $data);
    }
    
     public function remove_item()
    {
        $input_id = $_POST['input_id'];
        $key = array_search($input_id, $_SESSION['inputs_cart_items']);
        unset($_SESSION['inputs_cart_items'][$key]);
    }
    public function checkout(){
        $data['page_title'] = "E-haho Checkout";
        $data['provinces'] = $this->Inputs_Model->all_provinces();
        $this->load->view('market/inputs_checkout.php', $data);
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
    public function add_to_cart()
    {
        if (isset($_POST['input_id'])) {
            $input_id = $_POST['input_id'];
            if (empty($_SESSION['inputs_cart_items'])) {
                $_SESSION['inputs_cart_items'] = array();
            }
            if (!in_array($input_id, $_SESSION['inputs_cart_items'])) {
                array_push($_SESSION['inputs_cart_items'], $input_id);
            }
            echo json_encode($_SESSION['inputs_cart_items']);
        }
    }
    public function show_single_product(){
        if(isset($_POST['input_id'])){
            $input_id = $_POST['input_id'];
            echo $this->Inputs_Model->get_single_product($input_id);
        }
        else{
            echo "function was not triggered";
        }
    }
    
    public function get_categories(){
        if(isset($_POST['get_cat'])){
          echo $this->Inputs_Model->get_categories();
        }
        else{
            echo "function was not triggered";
        }
    }
    
    
    
    public function checkout_process()
    {
        $order = array();
        $order = json_decode(json_encode(json_decode($this->input->post('inputs_order'))), true);
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
        if ($this->session->userdata('loggedIn')) {
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
            if ($this->input->post('new_address')===1) {
                $this->form_validation->set_rules('_names', 'Names', 'required|min_length[3]');
                $this->form_validation->set_rules('_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('_phone', 'phone number', 'required|exact_length[10]');
                $this->form_validation->set_rules('_identity', 'national id', 'required|exact_length[16]');
                $this->form_validation->set_rules('_country', 'country', 'required');
                $this->form_validation->set_rules('_province', 'province', 'required');
                $this->form_validation->set_rules('_district', 'district', 'required');
                $this->form_validation->set_rules('_sector', 'sector', 'required');
                $this->form_validation->set_rules('_cell', 'cell', 'required');
                $this->form_validation->set_rules('_village', 'village', 'required');
            }
            
            if ($this->form_validation->run() == false) {
                //set the validation errors in flashdata (one time session)
                $this->session->set_flashdata('errors', validation_errors());
                $response['errors'] = validation_errors();
                $response['successes'] = null;
                $response['is_user_new'] = null;
                echo json_encode($response);
            } elseif ($this->form_validation->run() == true) {
                $shipping_address = 0;
                if ($this->input->post('new_address') == 1) {
                    $shipping_info = array(
                      'names' =>$this->input->post('_names'),
                      'email' => $this->input->post('_email'),
                      'phone' => $this->input->post('_phone'),
                      'national_id' => $this->input->post('_identity'),
                      'country' => $this->input->post('_country'),
                      'province' => $this->input->post('_province'),
                      'district' => $this->input->post('_district'),
                      'sector' => $this->input->post('_sector'),
                      'cell' => $this->input->post('_cell'),
                      'village' => $this->input->post('_village'),
                      'type' => 'inputs',
                      'deleted' => 'No'
                    );
                    $shipping_address = $this->Inputs_Model->add_shipping_address($shipping_info);
                }
                $add_order;
                $userId = $this->session->user_id;
                foreach ($order as $order) {
                    $data = array(
                        'order_id' => "INPO/".time(),
                        'buyer_id' => "$userId",
                        'seller_id' => $order['agrodealer_id'],
                        'product_id' => $order['product_id'],
                        'quantity' => $order['qty'],
                        'price' => $order['total_price'],
                        'subtotal' => $order['subtotal'],
                        'balance' => 0,
                        'zone_area' => 2,
                        'status' => 'Pending',
                        'input_id' => $order['input_id'],
                        'payment_method' => $payment_method,
                        'shipping_address' => $shipping_address
                      );
                    array_push($order_data, $data);
                }
                $add_order = $this->Inputs_Model->add_user_order($order_data);
                if ($add_order > 0) {
                    $_SESSION['cart_items'] = array();
                    $response['errors'] = null;
                    $response['is_user_new'] = 0;
                    $response['successes'] = "Order has been Successfully Made";
                    echo json_encode($response);
                } else {
                    $response['errors'] = "ordering failed. please try again!";
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
                $this->form_validation->set_rules('_names', 'New shipping Names', 'required|min_length[3]');
                $this->form_validation->set_rules('_email', 'New shipping Email', 'required|valid_email');
                $this->form_validation->set_rules('_phone', 'New shipping phone number', 'required|exact_length[10]');
                $this->form_validation->set_rules('_identity', 'New shipping national id', 'required|exact_length[16]');
                $this->form_validation->set_rules('_country', 'New shipping country', 'required');
                $this->form_validation->set_rules('_province', 'New shipping province', 'required');
                $this->form_validation->set_rules('_district', 'New shipping district', 'required');
                $this->form_validation->set_rules('_sector', 'New shipping sector', 'required');
                $this->form_validation->set_rules('_cell', 'New shipping cell', 'required');
                $this->form_validation->set_rules('_village', 'New shipping village', 'required');
            }
            if ($this->form_validation->run() == false) {
                //set the validation errors in flashdata (one time session)
                $this->session->set_flashdata('errors', validation_errors());
                $response['errors'] = validation_errors();
                $response['successes'] = null;
                $response['is_user_new'] = null;
                echo json_encode($response);
            } elseif ($this->form_validation->run() == true) {
                $credentials = array(
              'username' => $this->input->post('phone'),
              'password' => md5($this->input->post('password')),
              'role' => 'Consumer',
              'status' => 'Active'
            );
                $user_id= $this->Inputs_Model->add_user_credential($credentials);
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
                  'role' => 'Consumer',
                  'status' => 'Active',
                  'agent_id' => 0,
                  'about' => null,
                  'photo' => null,
                  'message' => 'No'
                );
                $userId = $this->Inputs_Model->add_user_data($user_data);
                if ($user_id > 0 && $userId > 0) {
                    $session_data = array(
                      "names" => $this->input->post('names'),
                      "email" => $this->input->post('email'),
                      "phone" => $this->input->post('phone'),
                      "national_id" => $this->input->post('national_id'),
                      "province" => $this->Inputs_Model->get_province($this->input->post('province')),
                      'district' => $this->Inputs_Model->get_district($this->input->post('district')),
                      'sector' => $this->Inputs_Model->get_sector($this->input->post('sector')),
                      'cell' => $this->Inputs_Model->get_cell($this->input->post('cell')),
                      'village' => $this->Inputs_Model->get_village($this->input->post('village')),
                      "user_id" => $userId,
                      "loggedIn" => true
                    );
                }

                $shipping_address = 0;
                if ($this->input->post('new_address') == 1) {
                    $shipping_info = array(
                      'names' =>$this->input->post('_names'),
                      'email' => $this->input->post('_email'),
                      'phone' => $this->input->post('_phone'),
                      'national_id' => $this->input->post('_identity'),
                      'country' => $this->input->post('_country'),
                      'province' => $this->input->post('_province'),
                      'district' => $this->input->post('_district'),
                      'sector' => $this->input->post('_sector'),
                      'cell' => $this->input->post('_cell'),
                      'village' => $this->input->post('_village'),
                      'type' => 'inputs',
                      'deleted' => 'No'
                    );
                    $shipping_address = $this->Inputs_Model->add_shipping_address($shipping_info);
                }

                //user order processing
                $add_order;
                foreach ($order as $order) {
                    $data = array(
                        'order_id' => "INPO/".time(),
                        'buyer_id' => "$userId",
                        'seller_id' => $order['agrodealer_id'],
                        'product_id' => $order['product_id'],
                        'quantity' => $order['qty'],
                        'price' => $order['total_price'],
                        'subtotal' => $order['subtotal'],
                        'balance' => 0,
                        'zone_area' => 2,
                        'status' => 'Pending',
                        'input_id' => $order['input_id'],
                        'payment_method' => $payment_method,
                        'shipping_address' => $shipping_address
                    );
                    array_push($order_data, $data);
                }
                $add_order = $this->Inputs_Model->add_user_order($order_data);
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
            $data = array(
                'user' => $this->input->post('user'),
                'password' => md5($this->input->post('password'))
            );
            $check = $this->Inputs_Model->user_auth($data);
            if ($check['loggedIn'] == true) {
                $session_data_ = array(
                "names" => $check['names'],
                "email" => $check['email'],
                "phone" => $check['phone'],
                "national_id" => $check['national_id'],
                "province" => $this->Inputs_Model->get_province($check['province']),
                "district" => $this->Inputs_Model->get_district($check['district']),
                "sector" => $this->Inputs_Model->get_sector($check['sector']),
                "cell" => $this->Inputs_Model->get_cell($check['cell']),
                "village" => $this->Inputs_Model->get_village($check['village']),
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
          'role' => 'Consumer',
          'status' => 'Active'
        );
            $user_id= $this->Inputs_Model->add_user_credential($credentials);
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
          'role' => 'Consumer',
          'status' => 'Active',
          'agent_id' => 0,
          'about' => null,
          'photo' => null,
          'message' => 'No'
        );
            $userId = $this->Inputs_Model->add_user_data($user_data);
            if ($user_id > 0 && $userId > 0) {
                $session_data__ = array(
                  "names" => $this->input->post('names'),
                  "email" => $this->input->post('email'),
                  "phone" => $this->input->post('phone'),
                  "national_id" => $this->input->post('identity'),
                  "province" => $this->Inputs_Model->get_province($this->input->post('province')),
                  'district' => $this->Inputs_Model->get_district($this->input->post('district')),
                  'sector' => $this->Inputs_Model->get_sector($this->input->post('sector')),
                  'cell' => $this->Inputs_Model->get_cell($this->input->post('cell')),
                  'village' => $this->Inputs_Model->get_village($this->input->post('village')),
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
    
    public function logout()
    {
        //unset the logged_in session and redirect to login page
        $session_data = array('names','email', 'phone','loggedIn');
        $this->session->unset_userdata($session_data);
        redirect(base_url().'inputs_shop');
    }
  

}
?>