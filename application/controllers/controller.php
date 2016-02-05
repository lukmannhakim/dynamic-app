<?php
class controller extends CI_Controller{

	public function index()
	{
		$this->show("tbl_siswa");
		//echo "ttt";
		//$tes = array( 
  //"United Kingdom" => "London", 
  //"United States" => "Washington", 
  //"France" => "Paris", 
  //"India" => "Delhi" 
//); 
		
	//	echo $this->isFK($tes,$tes);
		
	}
	public function submit($tbl)
	{
			$this->load->model('model');
			$column=$this->model->column_name($tbl);
			foreach( $column as $col)
			{
			$name=$col->name;
			$data[$name]= $this->input->post($name, TRUE);	
			}
			$pk=$this->model->primaryKey($tbl);
			$this->db->where($pk, $data[$pk]);
			$this->db->update($tbl, $data);
			$this->show($tbl);
	
	}
		public function form_update($tbl,$id,$value)
	{
			$this->load->model('model');
		$this->data[tbl]=$tbl;
		$this->data[column]=$this->model->column_name($tbl);
		$this->data[id]=$id;
		$this->data[value]=$value;
		$this->data[data]=$this->model->ambilByCol($tbl,$id,$value);
		$this->load->view('form',$this->data);
		
	}
	 public function hasil_hitung(){
		$a= $this->input->post(1);
		$b= $this->input->post(2);
		echo $a+$b;
	}



public function show($tbl)
{
	$this->load->database() ;
	if ($this->db->table_exists($tbl))
	{
		{
		$this->load->model('model');
		$this->data[column]=$this->model->column_name($tbl);
		$this->data[data]=$this->model->ambil($tbl);
		$this->data[tbl]=$tbl;
		$this->load->view('tampil',$this->data);
		}
	}
}
public function delete ($tbl,$col,$value )
{
	$this->db->where($col, $value);
$this->db->delete($tbl); 
$this->show($tbl);
}
}
?>