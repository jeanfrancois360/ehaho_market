<?php
defined('BASEPATH' or exit('No direct script access allowed'));
class Inputs_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        // Load Database
        $this->load->database();
    }
    function count_inputs(){
		return $this->db->count_all('inputs');
	}
    public function fetch_inputs(){
        $response = array();
        $this->db->select('inp.*,cat.name');
        $this->db->select('inp.*,cat.name');
        $this->db->from('inputs inp, category cat');
        $this->db->where('cat.id = inp.category');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $response['bool'] = true;
            $response['d'] = $query->result_array();
        }
        else
        {
            $response['bool'] = false;
        }
        return $response;

    }
}

?>