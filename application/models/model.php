<?php
if (!defined('BASEPATH')) 
     exit('No direct script access allowed'); 
 
class model extends CI_Model{
	
	///////////////////////
	function ambil($table){
$query = $this-> db ->get($table);

   if ($query->num_rows() > 0) 
   { 
       foreach ($query->result() as $data)
	    { 
        $hasil[] = $data; 
      	 } 
		 return $hasil;
   }
								 
	}
	/////////////////////////
function ambilByCol($tbl,$id,$value){
		
	$query =  $this->db->get_where($tbl,array($id=>$value));

   if ($query->num_rows() > 0) 
   { 
       foreach ($query->result() as $data)
	    { 
        $hasil[] = $data; 
      	 } 
		 return $hasil;
   }
								 
	}
	
/////////////////////
function ambilByArrCol($tbl,$arrCol){
	$i=0;
	while($arrCol[$i])
	{
		echo $arrCol[$i];
	$i++;	
	}
	/*	
	$query =  $this->db->get_where($tbl,array($id=>$value));

   if ($query->num_rows() > 0) 
   { 
       foreach ($query->result() as $data)
	    { 
        $hasil[] = $data; 
      	 } 
		 return $hasil;
   }
	*/							 
	}	
//////////////////
function column_name($table)
	{
	$fields = $this->db->field_data($table);

foreach ($fields as $field)
{
  $hasil[]= $field;
}	
return $hasil;
	}
//////

function primaryKey($table)
	{
	$fields = $this->db->field_data($table);

foreach ($fields as $field)
{
	if($field->primary_key==1)
	{
  $hasil= $field->name;
 
	}
}	
return $hasil;
	}
///////
	public function isFK($tbl,$col)
	{// print each value 
	
//foreach ($col as $key => $value) { 
 // echo "$value is in $key. \r\n"; 
//} 
	$tbl_relasi='tbl_relasi';
	$where[fk_tbl]=$tbl;
	$where[fk_col]=$col;

	$query = $this->db->get_where($tbl_relasi,$where);
	  foreach ($query->result() as $dat )
	    { 
        $hasil[] = $dat; 
	
      	 } 
	$data[data]=$hasil;
	$num_row=$query->num_rows();
	//echo $num_row;
	
	if($num_row>0)
	{
$data[status]=1;
	}
	else
	{
	$data[status]=0;
	}
	return $data;
}
////////
public function generateFK($tbl,$col)
{
	$tbl_relasi='tbl_relasi';
	$where[fk_tbl]=$tbl;
	$where[fk_col]=$col;

	$query = $this->db->get_where($tbl_relasi,array('fk_tbl'=>$tbl,'fk_col'=>$col));
	 foreach ($query->result() as $dat)
	    { 
		$this->db->select($dat->pk_col);
		$query2= $this->db->get($dat->pk_tbl);
		
		}
		

}
///
}
//////////

/////

?>