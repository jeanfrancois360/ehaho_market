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
    //add user $credentials
    public function add_user_credential($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    // add user data
    public function add_user_data($data)
    {
        $this->db->insert('buyer_seller', $data);
        return $this->db->insert_id();
    }
    // add user supplier offer
    public function add_supplier_offer($data)
    {
        $this->db->insert('supplier_offers', $data);
        return $this->db->insert_id();
    }
    // add pre order
    public function pre_order($data)
    {
        $this->db->insert('pre_orders', $data);
        return $this->db->insert_id();
    }
    //add shipping address
    public function add_shipping_address($data)
    {
        $this->db->insert('shipping_address', $data);
        return $this->db->insert_id();
    }
    //add user order
    public function add_user_order($data)
    {
        $this->db->insert_batch('buyer_orders', $data);
        return $this->db->insert_id();
    }

    //offer status update
    public function offer_update($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('supplier_offers', array('status' => $status));
        return true;
    }

    //update supplied quantity
    public function update_supplied($id, $toUpdate)
    {
        $this->db->where('o_id', $id);
        $this->db->update('buyer_orders', array('quantity' => $toUpdate));
        return true;
    }

    // Count Total List
    public function count_list()
    {
        return $this->db->count_all_results('market_place');
    }
    public function count_list_by_category($category)
    {
        $this->db->select('market_place.*');
        $this->db->from('market_place,product_category_associations');
        $this->db->where("market_place.product_id = product_category_associations.product_id");
        $this->db->where('product_category_associations.category_id', $category);
        $this->db->where('product_category_associations.deleted != "Yes"');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_list_by_tag($tag)
    {
        $this->db->select('market_place.*');
        $this->db->from('market_place,tags_associations');
        $this->db->where("market_place.product_id = tags_associations.product_id");
        $this->db->where('tags_associations.tag_id', $tag);
        $this->db->where('tags_associations.deleted != "Yes"');
        $this->db->where('tags_associations.type = "Food"');
        $query = $this->db->get();
        return $query->num_rows();
    }

    // GET PRODUCT CATEGORIES
    public function get_product_categories()
    {
        // return true;
        $this->db->select('*');
        $this->db->from('product_categories');
        $this->db->where('parent_id', 0);
        $this->db->where('deleted !="Yes"');
        $query = $this->db->get();
        return $query->result_array();
    }
    // GET PRODUCT TAGS
    public function get_product_tags()
    {
        // return true;
        $this->db->select('*');
        $this->db->from('tags');
        $this->db->where('deleted !="Yes"');
        $this->db->where('type ="Food"');
        $query = $this->db->get();
        return $query->result_array();
    }

    //check user $credentials
    public function user_auth($data)
    {
        $user = $data['user'];
        $password = $data['password'];
        $condition = "users.id = buyer_seller.user_id AND users.password = '$password' AND (users.username = '$user' OR buyer_seller.phone = '$user' OR buyer_seller.email = '$user') AND users.role ='Customer' AND buyer_seller.role = 'Customer' AND users.status = 'Active' AND buyer_seller.status = 'Active'";
        $this->db->select('buyer_seller.*,users.*');
        $this->db->from('buyer_seller, users');
        $this->db->where($condition);
        $query = $this->db->get();
        $response = array();
        if ($query->num_rows() == 1) {
            $row = $query->result_array();
            foreach ($row as $row) {
                $response['names'] = $row['name'];
                $response['email'] = $row['email'];
                $response['phone'] = $row['phone'];
                $response['province'] = $row['province'];
                $response['district'] = $row['district'];
                $response['sector'] = $row['sector'];
                $response['cell'] = $row['cell'];
                $response['village'] = $row['village'];
                $response['national_id'] = $row['national_id'];
                $response['user_id'] = $row['id'];
                $response['loggedIn'] = true;
            }
            return $response;
        } else {
            $response['loggedIn'] = false;
            return $response;
        }
    }

    // get buyer seller_id with $user_id
    public function get_user_id($id)
    {
        $sql = $this->db->query("SELECT id FROM buyer_seller WHERE user_id = '$id'");
        $row = $sql->row();
        if (isset($row)) {
            return $row->id;
        }
    }
    public function get_all_food($start)
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
        $this->db->select('market_place.*,product.product_name,product.description,unit.name AS unit');
        $this->db->from('market_place,product,unit');
        $this->db->where('market_place.product_id = product.id');
        $this->db->where('market_place.unit = unit.id');
        $this->db->order_by('market_place.m_id', 'DESC');
        $this->db->limit(12, $start);
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
            $response['description'] = $row['description'];
            $response['product_id'] = $row['product_id'];
            $response['unit'] = $row['unit'];
            $response['variety'] = "-";
            $response['variety_photo'] = 'no_image.jpg';
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
            $this->db->select('variety_name,photo');
            $this->db->where('id', $row['variety_id']);
            $query22 = $this->db->get('variety');
            $var = $query22->result_array();
            foreach ($var as $val22) {
                $variety = $val22['variety_name'];
                $variety_photo = $val22['photo'];
                if (!empty($variety)) {
                    $response['variety'] = $variety;
                    $response['variety_photo'] = $variety_photo;
                }
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
            if ($response['photo'] == 'no_image.jpg') {
                $response['photo'] = $response['variety_photo'];
            }
            array_push($response_list, $response);
        }
        return $response_list;
    }
    public function get_all_food_by_category($start, $category)
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
        $this->db->select('market_place.*,product.product_name,product.description,unit.name AS unit');
        $this->db->from('market_place,product_category_associations,product,unit');
        $this->db->where('market_place.product_id = product.id');
        $this->db->where('market_place.unit = unit.id');
        $this->db->where("market_place.product_id = product_category_associations.product_id");
        $this->db->where("product_category_associations.deleted != 'Yes'");
        $this->db->where('product_category_associations.category_id', $category);
        $this->db->order_by('market_place.m_id', 'DESC');
        $this->db->limit(12, $start);
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
            $response['description'] = $row['description'];
            $response['product_id'] = $row['product_id'];
            $response['unit'] = $row['unit'];
            $response['variety'] = "-";
            $response['variety_photo'] = 'no_image.jpg';
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
            $this->db->select('variety_name,photo');
            $this->db->where('id', $row['variety_id']);
            $query22 = $this->db->get('variety');
            $var = $query22->result_array();
            foreach ($var as $val22) {
                $variety = $val22['variety_name'];
                $variety_photo = $val22['photo'];
                if (!empty($variety)) {
                    $response['variety'] = $variety;
                    $response['variety_photo'] = $variety_photo;
                }
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
            if ($response['photo'] == 'no_image.jpg') {
                $response['photo'] = $response['variety_photo'];
            }
            array_push($response_list, $response);
        }
        return $response_list;
    }
    public function get_all_food_by_tag($start, $tag)
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
        $this->db->select('market_place.*,product.product_name,product.description,unit.name AS unit');
        $this->db->from('market_place,tags_associations,product,unit');
        $this->db->where('market_place.product_id = product.id');
        $this->db->where('market_place.unit = unit.id');
        $this->db->where("market_place.product_id = tags_associations.product_id");
        $this->db->where("tags_associations.deleted != 'Yes'");
        $this->db->where("tags_associations.type = 'Food'");
        $this->db->where('tags_associations.tag_id', $tag);
        $this->db->order_by('market_place.m_id', 'DESC');
        $this->db->limit(12, $start);
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
            $response['description'] = $row['description'];
            $response['product_id'] = $row['product_id'];
            $response['unit'] = $row['unit'];
            $response['variety'] = "-";
            $response['variety_photo'] = 'no_image.jpg';
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
            $this->db->select('variety_name,photo');
            $this->db->where('id', $row['variety_id']);
            $query22 = $this->db->get('variety');
            $var = $query22->result_array();
            foreach ($var as $val22) {
                $variety = $val22['variety_name'];
                $variety_photo = $val22['photo'];
                if (!empty($variety)) {
                    $response['variety'] = $variety;
                    $response['variety_photo'] = $variety_photo;
                }
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
            if ($response['photo'] == 'no_image.jpg') {
                $response['photo'] = $response['variety_photo'];
            }
            array_push($response_list, $response);
        }
        return $response_list;
    }
    public function get_unit($unit)
    {
        $this->db->select('unit.name');
        $this->db->from('unit');
        $this->db->where('id', $unit);
        $query = $this->db->get();
        $name = '';
        $row = $query->result_array();
        foreach ($row as $row) {
            $name = $row['name'];
        }
        return $name;
    }
    public function get_product_name($id)
    {
        $this->db->select('product.product_name');
        $this->db->from('product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $name = '';
        $row = $query->result_array();
        foreach ($row as $row) {
            $name = $row['product_name'];
        }
        return $name;
    }
    public function get_seller_name($role = '', $seller_id = 0)
    {
        $name = '';
        if ($role == 'Farmer') {
            $this->db->reset_query();
            $this->db->select('farmers_details.name');
            $this->db->from('farmers_details');
            $this->db->where('farmers_details.user_id', $seller_id);
            $q = $this->db->get();
            $row = $q->result_array();
            foreach ($row as $p) {
                $name = $p['name'];
            }
            return $name;
        } else {
            $this->db->reset_query();
            $this->db->select('buyer_seller.name');
            $this->db->from('buyer_seller');
            $this->db->where('buyer_seller.user_id', $seller_id);
            $q = $this->db->get();
            $row = $q->result_array();
            foreach ($row as $p) {
                $name = $p['name'];
            }
            return $name;
        }
    }
    public function get_buyer_orders()
    {
        $response = array();
        $response_list = array();
        $this->db->select('buyer_orders.*,buyer_seller.*,market_place.photo AS m_photo,market_place.role AS seller_role,unit.name AS unit_name,product.product_name,variety.variety_name,variety.photo AS variety_photo,province.name AS province,district.name AS district,sector.name AS sector,cell.name AS cell,village.name AS village');
        $this->db->from('buyer_orders,buyer_seller,market_place,product,variety,unit,province,district,sector,cell,village');
        $this->db->where('buyer_orders.user_id = buyer_seller.user_id');
        $this->db->where('buyer_orders.product_id = product.id');
        $this->db->where('buyer_orders.variety_id = variety.id');
        $this->db->where('buyer_orders.market_p_id = market_place.m_id');
        $this->db->where('buyer_seller.province = province.id');
        $this->db->where('buyer_seller.district = district.id');
        $this->db->where('buyer_seller.sector = sector.id');
        $this->db->where('buyer_seller.cell = cell.id');
        $this->db->where('buyer_seller.village = village.id');
        $this->db->where('market_place.unit = unit.id');
        $rows = $this->db->get()->result_array();
        foreach ($rows as $row) {
            $response['id'] = $row['id'];
            $response['o_id'] = $row['o_id'];
            $response['order_id'] = $row['order_id'];
            $response['user_id'] = $row['user_id'];
            $response['user_name'] = $row['name'];
            $response['national_id'] = $row['national_id'];
            $response['phone'] = $row['phone'];
            $response['email'] = $row['email'];
            $response['province'] = $row['province'];
            $response['district'] = $row['district'];
            $response['sector'] = $row['sector'];
            $response['cell'] = $row['cell'];
            $response['village'] = $row['village'];
            $response['seller'] = $this->get_seller_name($row['seller_role'], $row['buyer_seller_id']);
            $response['product_name'] = $row['product_name'];
            $response['variety_name'] = $row['variety_name'];
            $response['product_id'] = $row['product_id'];
            $response['variety_id'] = $row['variety_id'];
            $response['unit_id'] = $row['unit'];
            $response['photo'] = $row['m_photo'];
            $response['quantity'] = $row['quantity'];
            $response['unit_price'] = $row['price'];
            $response['unit'] = $row['unit_name'];
            $response['payment_method'] = $row['payment_method'];
            $response['status'] = $row['status'];
            $response['date'] = $row['date'];
            if ($row['m_photo'] == 'no_image.jpg') {
                $response['photo'] = $row['variety_photo'];
            }
            $response['shipping_address'] = $row['shipping_address'];
            $response['shipping_user_name'] = "";
            $response['shipping_national_id'] = "";
            $response['shipping_phone'] = "";
            $response['shipping_email'] = "";
            $response['shipping_province'] = "";
            $response['shipping_district'] = "";
            $response['shipping_sector'] = "";
            $response['shipping_cell'] ="";
            $response['shipping_village'] = "";
            if ($row['shipping_address'] > 0) {
                $this->db->reset_query();
                $this->db->select('shipping_address,province.name AS province,district.name AS district,sector.name AS sector,cell.name AS cell');
                $this->db->from('shipping_address,province,district,sector,cell,village');
                $this->db->where('shipping_address.province = province.id');
                $this->db->where('shipping_address.district = district.id');
                $this->db->where('shipping_address.sector = sector.id');
                $this->db->where('shipping_address.cell = cell.id');
                $this->db->where('shipping_address.village = village.id');
                $this->db->where('shipping_address.id', $row['shipping_address']);
                $this->db->where('shipping_address.deleted != "Yes"');
                $this->db->limit(1);
                $sh = $this->db->get()->result_array();
                $response['shipping_user_name'] = $sh['names'];
                $response['shipping_national_id'] = $sh['national_id'];
                $response['shipping_phone'] = $sh['phone'];
                $response['shipping_email'] = $sh['email'];
                $response['shipping_province'] = $sh['province'];
                $response['shipping_district'] = $sh['district'];
                $response['shipping_sector'] = $sh['sector'];
                $response['shipping_cell'] = $sh['cell'];
                $response['shipping_village'] = $sh['village'];
            }
            array_push($response_list, $response);
        }
        return $response_list;
    }
    public function get_pre_harvest()
    {
        $response = array();
        $response_list = array();
        $this->db->select('predictions.*,seasons.name,farmers_details.name,product.product_name,variety.variety_name,variety.photo');
        $this->db->from('predictions,seasons,farmers_details,product,variety');
        $this->db->where("predictions.season_id = seasons.id");
        $this->db->where("predictions.farmer_id = farmers_details.id");
        $this->db->where("predictions.product_id = product.id");
        $this->db->where("predictions.variety_id = variety.id");
        $rows = $this->db->get()->result_array();
        foreach ($rows as $row) {
            $response['id'] = $row['id'];
            $response['farmer_name'] = $row['name'];
            $response['product'] = $row['product_name'];
            $response['variety'] = $row['variety_name'];
            $response['quantity_before'] = $row['quantity_before'];
            $response['quantity_after'] = $row['quantity_after'];
            $response['photo'] = $row['photo'];
            $response['date'] = $row['date'];
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
                $response['product_id'] = $row['product_id'];
                $response['unit'] = $row['unit'];
                $response['variety'] = "-";
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
                $this->db->select('variety_name,photo');
                $this->db->where('id', $row['variety_id']);
                $query22 = $this->db->get('variety');
                $var = $query22->result_array();
                foreach ($var as $val22) {
                    $variety = $val22['variety_name'];
                    $variety_photo = $val22['photo'];
                    if (!empty($variety)) {
                        $response['variety'] = $variety;
                        $response['variety_photo'] = $variety_photo;
                    }
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
            if ($response['photo'] == 'no_image.jpg') {
                $response['photo'] = $response['variety_photo'];
            }
            array_push($response_list, $response);
        }
        return json_encode($response_list);
    }
    public function all_provinces()
    {
        $this->db->select('*');
        $query = $this->db->get('province');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function all_district()
    {
        $this->db->select("*");
        $this->db->from("district");
        $query = $this->db->get();
        return $query->result();
    }
    public function all_cell()
    {
        $this->db->select("*");
        $this->db->from("cell");
        $query = $this->db->get();
        return $query->result();
    }
    public function all_village()
    {
        $this->db->select("*");
        $this->db->from("village");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_province($id)
    {
        $this->db->select('name');
        $this->db->from('province');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        $name = "";
        foreach ($row as $row) {
            $name = $row['name'];
        }
        return $name;
    }
    public function get_district($id)
    {
        $this->db->select('name');
        $this->db->from('district');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        $name = "";
        foreach ($row as $row) {
            $name = $row['name'];
        }
        return $name;
    }
    public function get_sector($id)
    {
        $this->db->select('name');
        $this->db->from('sector');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        $name = "";
        foreach ($row as $row) {
            $name = $row['name'];
        }
        return $name;
    }
    public function get_cell($id)
    {
        $this->db->select('name');
        $this->db->from('cell');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        $name = "";
        foreach ($row as $row) {
            $name = $row['name'];
        }
        return $name;
    }
    public function get_village($id)
    {
        $this->db->select('name');
        $this->db->from('village');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        $name = "";
        foreach ($row as $row) {
            $name = $row['name'];
        }
        return $name;
    }
    public function all_location($table, $where)
    {
        $query=$this->db->get_where($table, $where);
        return $query->result_array();
    }
    public function show_single_cart($market_id)
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
        $this->db->select('market_place.*,product.product_name,unit.id AS unit');
        $this->db->from('market_place,product,unit');
        $this->db->where('market_place.product_id = product.id');
        $this->db->where('market_place.unit = unit.id');
        $this->db->where('market_place.m_id', $market_id);
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
            $response['product_id'] = $row['product_id'];
            $response['unit'] = $row['unit'];
            $response['variety'] = $row['variety_id'];
            $response['buyer_seller_id'] = $row['user_id'];
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
            $this->db->select('variety_name,photo');
            $this->db->where('id', $row['variety_id']);
            $query22 = $this->db->get('variety');
            $var = $query22->result_array();
            foreach ($var as $val22) {
                $variety = $val22['variety_name'];
                $variety_photo = $val22['photo'];
                if (!empty($variety)) {
                    $response['variety_name'] = $variety;
                    $response['variety_photo'] = $variety_photo;
                }
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
            if ($response['photo'] == 'no_image.jpg') {
                $response['photo'] = $response['variety_photo'];
            }
            array_push($response_list, $response);
        }
        return json_encode($response_list);
    }
    public function get_single_buyer_orders($user_id)
    {
        $condition = "(buyer_seller.id ='$user_id' OR buyer_seller.user_id = '$user_id')";
        $this->db->select('buyer_orders.*');
        $this->db->from('buyer_orders,buyer_seller');
        $this->db->where('buyer_orders.user_id = buyer_seller.user_id');
        $this->db->where($condition);
        $this->db->group_by('order_id');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function order_info($id)
    {
        $this->db->select('buyer_orders.*,product.product_name,variety.variety_name,variety.photo,unit.name AS unit_name');
        $this->db->from('buyer_orders,product,variety,unit');
        $this->db->where('product.id = buyer_orders.product_id');
        $this->db->where('variety.id = buyer_orders.variety_id');
        $this->db->where('unit.id = buyer_orders.unit');
        $this->db->where('buyer_orders.order_id', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function order_offers($id)
    {
        $this->db->select('supplier_offers.*,product.product_name,variety.variety_name,variety.photo,unit.name AS unit_name,province.name AS province,district.name AS district,sector.name AS sector,cell.name AS cell,village.name AS village');
        $this->db->from('supplier_offers,buyer_orders,product,variety,unit,province,district,sector,cell,village');
        $this->db->where('product.id = buyer_orders.product_id');
        $this->db->where('variety.id = buyer_orders.variety_id');
        $this->db->where('province.id = supplier_offers.province');
        $this->db->where('district.id = supplier_offers.district');
        $this->db->where('sector.id = supplier_offers.sector');
        $this->db->where('cell.id = supplier_offers.cell');
        $this->db->where('village.id = supplier_offers.village');
        $this->db->where('unit.id = buyer_orders.unit');
        $this->db->where('supplier_offers.order_id = buyer_orders.o_id');
        $this->db->where('buyer_orders.order_id', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
