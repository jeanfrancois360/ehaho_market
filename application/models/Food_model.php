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
        $this->db->select('market_place.*,product.product_name,unit.name AS unit');
        $this->db->from('market_place,product,unit');
        $where = 'product.id = market_place.product_id AND market_place.unit = unit.id';
        $this->db->where($where);
        // $this->db->where('market_place.product_id = product.id');
        // $this->db->where('market_place.variety_id = variety.id');
        // $this->db->where('market_place.unit = unit.id');
        // $this->db->where('market_place.m_id = buyer_orders.market_p_id');
        // $this->db->where('farmers_details.id = market_place.user_id OR buyer_seller.id = market_place.user_id');
        // $this->db->or_where('buyer_seller.id = market_place.user_id');
        // $this->db->where('district.id = farmers_details.district');
        // $this->db->or_where('district.id = buyer_seller.district');
        // $this->db->where('sector.id = farmers_details.sector');
        // $this->db->or_where('sector.id = buyer_seller.sector');
        $this->db->limit(10, 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $response['d'] = $query->result_array();
        }
        return $response;
    }
}
