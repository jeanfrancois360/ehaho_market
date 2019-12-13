<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Food_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_food()
    {
        $response = array();
        $response_list = array();
        $arr = array();
        $quantity = "";
        $_quantity = 0;
        $name = "";
        $phone = "";
        $sector = "";
        $district = "";
        $variety = "";
        $this->db->select('market_place.*,product.product_name,unit.name AS unit');
        $this->db->from('market_place,product,unit');
        $this->db->where('market_place.product_id = product.id');
        $this->db->where('market_place.unit = unit.id');
        $this->db->order_by('market_place.m_id', 'DESC');
        $this->db->limit(12, 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $arr = $query->result_array();
        }
        foreach ($arr as $row) {
            $response['m_id'] = $row['m_id'];
            $response['price_unit'] = $row['price_unit'];
            $response['status'] = $row['status'];
            $response['role'] = $row['role'];
            $response['date'] = $row['date'];
            $response['photo'] = $row['photo'];
            $response['product_name'] = $row['product_name'];
            $response['unit'] = $row['unit'];
            $this->db->reset_query();
            $this->db->limit(1, 0);
            $this->db->select_sum('quantity')->where('market_p_id', $row['m_id']);
            $query2 = $this->db->get('buyer_orders');
            $quantity = $query2->result_array();
            foreach ($quantity as $val) {
                $_quantity = $val['quantity'];
                $response['quantity'] = $_quantity;
            }
            $this->db->reset_query();
            $this->db->select('variety_name');
            $this->db->where('id', $row['variety_id']);
            $query22 = $this->db->get('variety');
            $var = $query22->result_array();
            foreach ($var as $val22) {
                $variety = $val22['variety_name'];
                $response['variety'] = $variety;
            }
            if ($row['role'] === 'farmer') {
                $this->db->reset_query();
                $this->db->select('name, phone,district,sector');
                $this->db->where('id', $row['user_id']);
                $query3 = $this->db->get('farmers_details');
                $farmer_data = $query3->result_array();
                if (empty($buyer_data)) {
                    $response['name'] = "";
                    $response['phone'] = "";
                    $response['district'] = "";
                    $response['sector'] = "";
                }
                foreach ($farmer_data as $val2) {
                    $name = $val2['name'];
                    $phone = $val2['phone'];
                    $response['name'] = $name;
                    $response['phone'] = $phone;
                    $this->db->reset_query();
                    $this->db->select('name');
                    $this->db->where('id', $val2['district']);
                    $query4 = $this->db->get('district');
                    $dist_data = $query4->result_array();
                    foreach ($dist_data as $val3) {
                        $district = $val3['name'];
                        $response['district'] = $district;
                    }
                    $this->db->reset_query();
                    $this->db->select('name');
                    $this->db->where('id', $val2['sector']);
                    $query5 = $this->db->get('sector');
                    $sect_data = $query4->result_array();
                    foreach ($sect_data as $val4) {
                        $sector = $val4['name'];
                        $response['sector'] = $sector;
                    }
                }
            } else {
                $this->db->reset_query();
                $this->db->select('name, phone,district,sector');
                $this->db->where('id', $row['user_id']);
                $query3 = $this->db->get('buyer_seller');
                $buyer_data = $query3->result_array();
                if (empty($buyer_data)) {
                    $response['name'] = "";
                    $response['phone'] = "";
                    $response['district'] = "";
                    $response['sector'] = "";
                }
                foreach ($buyer_data as $val2) {
                    $name = $val2['name'];
                    $phone = $val2['phone'];
                    $response['name'] = $name;
                    $response['phone'] = $phone;
                    $this->db->reset_query();
                    $this->db->select('name');
                    $this->db->where('id', $val2['district']);
                    $query4 = $this->db->get('district');
                    $dist_data = $query4->result_array();
                    foreach ($dist_data as $val3) {
                        $district = $val3['name'];
                        $response['district'] = $district;
                    }
                    $this->db->reset_query();
                    $this->db->select('name');
                    $this->db->where('id', $val2['sector']);
                    $query5 = $this->db->get('sector');
                    $sect_data = $query4->result_array();
                    foreach ($sect_data as $val4) {
                        $sector = $val4['name'];
                        $response['sector'] = $sector;
                    }
                }
            }
            array_push($response_list, $response);
        }
        return $response_list;
    }
    public function show_cart()
    {
        $cart_items = $_SESSION['cart_items'];
        $response = array();
        $response_list = array();
        $arr = array();
        $quantity = "";
        $_quantity = 0;
        $name = "";
        $phone = "";
        $sector = "";
        $district = "";
        $variety = "";
        foreach ($cart_items as $market_id) {
            $this->db->select('market_place.*,product.product_name,unit.name AS unit');
            $this->db->from('market_place,product,unit');
            $this->db->where('market_place.product_id = product.id');
            $this->db->where('market_place.unit = unit.id');
            if (!empty($market_id) && $market_id > 0) {
                $this->db->where('market_place.m_id', $market_id);
            } else {
                return json_encode($data['message'] = "cart is empty");
            }
            $this->db->order_by('market_place.m_id', 'DESC');
            $this->db->limit(12, 0);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $arr = $query->result_array();
            }
            $subtotal = 0;
            foreach ($arr as $row) {
                $response['m_id'] = $row['m_id'];
                $response['price_unit'] = $row['price_unit'];
                $response['status'] = $row['status'];
                $response['role'] = $row['role'];
                $response['date'] = $row['date'];
                $response['photo'] = $row['photo'];
                $response['product_name'] = $row['product_name'];
                $response['unit'] = $row['unit'];
                $this->db->reset_query();
                $this->db->limit(1, 0);
                $this->db->select_sum('quantity')->where('market_p_id', $row['m_id']);
                $query2 = $this->db->get('buyer_orders');
                $quantity = $query2->result_array();
                foreach ($quantity as $val) {
                    $_quantity = $val['quantity'];
                    $response['quantity'] = $_quantity;
                }
                $this->db->reset_query();
                $this->db->select('variety_name');
                $this->db->where('id', $row['variety_id']);
                $query22 = $this->db->get('variety');
                $var = $query22->result_array();
                foreach ($var as $val22) {
                    $variety = $val22['variety_name'];
                    $response['variety'] = $variety;
                }
                if ($row['role'] === 'farmer') {
                    $this->db->reset_query();
                    $this->db->select('name, phone,district,sector');
                    $this->db->where('id', $row['user_id']);
                    $query3 = $this->db->get('farmers_details');
                    $farmer_data = $query3->result_array();
                    if (empty($buyer_data)) {
                        $response['name'] = "";
                        $response['phone'] = "";
                        $response['district'] = "";
                        $response['sector'] = "";
                    }
                    foreach ($farmer_data as $val2) {
                        $name = $val2['name'];
                        $phone = $val2['phone'];
                        $response['name'] = $name;
                        $response['phone'] = $phone;
                        $this->db->reset_query();
                        $this->db->select('name');
                        $this->db->where('id', $val2['district']);
                        $query4 = $this->db->get('district');
                        $dist_data = $query4->result_array();
                        foreach ($dist_data as $val3) {
                            $district = $val3['name'];
                            $response['district'] = $district;
                        }
                        $this->db->reset_query();
                        $this->db->select('name');
                        $this->db->where('id', $val2['sector']);
                        $query5 = $this->db->get('sector');
                        $sect_data = $query4->result_array();
                        foreach ($sect_data as $val4) {
                            $sector = $val4['name'];
                            $response['sector'] = $sector;
                        }
                    }
                } else {
                    $this->db->reset_query();
                    $this->db->select('name, phone,district,sector');
                    $this->db->where('id', $row['user_id']);
                    $query3 = $this->db->get('buyer_seller');
                    $buyer_data = $query3->result_array();
                    if (empty($buyer_data)) {
                        $response['name'] = "";
                        $response['phone'] = "";
                        $response['district'] = "";
                        $response['sector'] = "";
                    }
                    foreach ($buyer_data as $val2) {
                        $name = $val2['name'];
                        $phone = $val2['phone'];
                        $response['name'] = $name;
                        $response['phone'] = $phone;
                        $this->db->reset_query();
                        $this->db->select('name');
                        $this->db->where('id', $val2['district']);
                        $query4 = $this->db->get('district');
                        $dist_data = $query4->result_array();
                        foreach ($dist_data as $val3) {
                            $district = $val3['name'];
                            $response['district'] = $district;
                        }
                        $this->db->reset_query();
                        $this->db->select('name');
                        $this->db->where('id', $val2['sector']);
                        $query5 = $this->db->get('sector');
                        $sect_data = $query4->result_array();
                        foreach ($sect_data as $val4) {
                            $sector = $val4['name'];
                            $response['sector'] = $sector;
                        }
                    }
                }
            }
            array_push($response_list, $response);
        }
        return json_encode($response_list);
    }
}
