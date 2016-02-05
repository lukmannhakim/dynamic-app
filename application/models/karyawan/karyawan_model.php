<?php
class Karyawan_model extends CI_Model{
function __construct(){
parent::__construct();
    
}
function insert_karyawan($data){
     $this->db->insert('tbl_karyawan', $data);
}
function select_all(){
     $this->db->select('*');
$this->db->from('tbl_karyawan');
return $this->db->get();
}
function select_by_id($niy){
   $this->db->select('*');
$this->db->from('tbl_karyawan');
$this->db->where('niy', $niy);
return $this->db->get();
}
function update_tbl_karyawan($niy, $data){
$this->db->where('niy', $niy);
$this->db->update('tbl_karyawan', $data); 
}
function delete_tbl_karyawan($niy){
   $this->db->where('niy', $niy);
$this->db->delete('tbl_karyawan'); 
}
// function yang digunakan oleh paginationsample
  function select_all_paging($limit=array()){
      $this->db->select('*');
$this->db->from('tbl_karyawan');
$this->db->order_by('niy', 'desc');
      if ($limit != NULL)
$this->db->limit($limit['perpage'], $limit['offset']);
         
return $this->db->get();
  }
}
?>