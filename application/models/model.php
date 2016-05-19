<?php
if (!defined('BASEPATH')) 
     exit('No direct script access allowed'); 
 
class model extends CI_Model{
	
//mengambil semua data pada sebuah tabel
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
//mengambil data dengan kriteria 1 nilai tertentu
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
	
////mengambil data dengan kriteria beberapa kriteria
function ambilByArrCol($tbl,$arrCol){
	$i=0;
	while($arrCol[$i])
	{
		echo $arrCol[$i];
	$i++;	
	}
							 
	}	

//membaca primary key dari sebuah tabel ( asumsi hanya punya 1 primary key )
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
//fungsi prototipe( belum digunakan )
	public function isFK($tbl,$col)
	{
	$tbl_relasi='tbl_relasi';
	$where[fk_tbl]=$tbl;
	$where[fk_col]=$col;

	$query = $this->db->get_where($tbl_relasi,$where);
	
	$num_row=$query->num_rows();
	if($num_row>0)
	{
$hasil=1;
	}
	else
	{
	$hasil=0;
	}
	return $hasil;
}

//mengambil nama kolom tabel
function column_name($table)
	{
	$fields = $this->db->field_data($table);

foreach ($fields as $field)
{
  $hasil[]= $field;
}	
return $hasil;
	}
///belum digunakan
public function generateFK2($tbl,$col,$value)
{
	$tbl_relasi='tbl_relasi';
	
	$were= "fk_tbl ='". $tbl."' and fk_col = '".$col."'";
	$query=$this->db->where($were);
	$query = $this->db->get($tbl_relasi);
	
	 foreach ($query->result() as $dat)
	    { 
		$where="";
		$pk_tbl=$dat->pk_tbl;
		$where=$col." = '".$value."'";
		$query2=$this->db->where($where);
		$query2 = $this->db->get($pk_tbl);
		foreach ($query2->result() as $data2){
		$arrayvar2=$this->column_name($pk_tbl);
		$x=0;
		foreach ($arrayvar2 as $data3)
		{
			if($x>1)
			{			break;
			}
			$coll=$data3->name;
			$hasil[]= $data2->$coll;
			$x++;
		}
		return $hasil[1];
			
		}
		}
		
}
public function generateFK($tbl,$col)
{
	$tbl_relasi='tbl_relasi';
	$where[fk_tbl]=$tbl;
	$where[fk_col]=$col;
	$were= "fk_tbl ='". $tbl."' and fk_col = '".$col."'";
	$query=$this->db->where($were);
	$query = $this->db->get($tbl_relasi);
	
	 foreach ($query->result() as $dat)
	    { 
		
		$tbb=$dat->pk_tbl;
		$query2= $this->db->get($tbb);
		
		foreach ($query2->result() as $data2)
		{
		
			
			$arrayvar2=$this->column_name($tbb);
		$x=0;
			foreach ($arrayvar2 as $data3)
		{
			if($x>1)
			{			break;
			}
			$coll=$data3->name;
			$hasil[]= $data2->$coll;
			$x++;
		}
		
		$hasil2[]=$hasil;
		$hasil="";
		}
		}
	return $hasil2;	

}

}


?>