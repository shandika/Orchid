<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cekCust($k,$p) {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("customer");
    }

    function cekMar($k,$p) {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("marketing");
    }

    function cekPm($k,$p) {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("pm");
    }
}