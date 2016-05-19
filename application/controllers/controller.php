
<?php
class controller extends CI_Controller{


	public function index()
	{
		$this->load->view(login);
			
	}
	public function login()
	{
		$this->load->helper('security');
		$username=$this->input->post("username");
		$password= do_hash($this->input->post("password", TRUE), 'md5');
		if( $this->checkLogin($username,$password)>=1){
		$this->show('tbl_siswa');
		}
	}
	 function checkLogin($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('tbl_username');
        return $query->num_rows();
    }
	//fungsi memanggil mngupdate data ke database
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
	//fungsi  memasukkan data ke database
	public function submit_input($tbl)
	{
			$this->load->model('model');
			$column=$this->model->column_name($tbl);
			foreach( $column as $col)
			{
			$name=$col->name;
			$data[$name]= $this->input->post($name, TRUE);	
			}
	
			$this->db->insert($tbl, $data);
			$this->show($tbl);
	
	}
	//fungsi memanggil view untuk form update
		public function form_update($tbl,$id,$value)
	{
			$this->load->model('model');
		$this->data[tbl]=$tbl;
		$this->data[column]=$this->model->column_name($tbl);
		$this->data[id]=$id;
		$this->data[value]=$value;
		$this->data[data]=$this->model->ambilByCol($tbl,$id,$value);
			$this->load->view('frame');
		$this->load->view('form',$this->data);
		
	}
	//fungsi memanggil view untuk form input
		public function form_input($tbl)
	{
			$this->load->model('model');
		$this->data[tbl]=$tbl;
		$this->data[column]=$this->model->column_name($tbl);
			$this->load->view('frame');
		$this->load->view('form_input',$this->data);
		
	}

	 

// menampilkan semua data pada tabel

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
		$this->load->view('frame');
		$this->load->view('tampil',$this->data);
		}
	}
}
//fungsi memanggil memnghapus  data dari database
public function delete ($tbl,$col,$value )
{
	$this->db->where($col, $value);
$this->db->delete($tbl); 
$this->show($tbl);
}
}
?>