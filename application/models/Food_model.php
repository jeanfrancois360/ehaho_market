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
        //
    }
}
