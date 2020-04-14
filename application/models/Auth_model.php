<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cekPurchasing($k, $p)
    {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("akun_purchasing");
    }

    function cekMarketing($k, $p)
    {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("akun_marketing");
    }

    function cekProjectManager($k, $p)
    {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("akun_project_manager");
    }

    function cekKeuangan($k, $p)
    {
        $this->db->where("ktp", $k);
        $this->db->where("password", $p);
        $this->db->limit(1);
        return $this->db->get("akun_keuangan");
    }
    function registrasi($k, $n, $a, $p, $s, $ntlp, $db)
    {
        $data = [
            'ktp' => $k,
            'nama' => $n,
            'alamat' => $a,
            'password' => $p,
            'status' => $s,
            'no_tlp' => $ntlp
        ];

        $this->db->insert($db, $data);
    }
}
