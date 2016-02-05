<?php
class Karyawan extends CI_Controller{
	   public function __construct(){
	     parent::__construct();
        $this->load->helper('url');
        $this->load->library('input');
        $this->load->model('karyawan/karyawan_model');
	   }
	       public function index()
    {   
        $data['daftar_karyawan'] = $this->karyawan_model->select_all()->result();
        $this->load->view('karyawan/daftar_karyawan', $data);
    }

}
?>