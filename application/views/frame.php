<html>
<head>
<?php
$this->load->library('javascript');
$this->load->helper('form');
$this->load->helper('url');
$tables = $this->db->list_tables();
$this->load->model('model');
$dataMenu=$this->model->ambil("tbl_menu");

?>
 <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap-theme.css')?>">
<script src="<?php echo base_url('bootstrap/js/jquery.js')?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.js')?>"></script>
<style type="text/css">
	.bs-example{
    	margin: 20px;
    }   
<style type="text/css">
	.bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
<div class="container-fluid"> 

<div class="bs-example">

 <nav role="navigation" class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Dynamic Web App</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <?php
foreach($dataMenu as $menu)
	{
	$niy=2;
	$jabatan=$this->model->ambilByCol("tbl_jabatan_pegawai","niy",$niy);
	$hakAkses=$this->model->ambilByCol("tbl_hak_akses","id_menu",$menu->id_menu);
	$i=0;
	foreach($jabatan as $jab ){
		foreach($hakAkses as $hak)
		{
		
	if($jab->id_jab == $hak->id_jab){
		$i++;
	}
		}
	}
	//$i=1;
	if($i>0){
		if($menu->titik_kait==0){
			   
			echo " <li class='dropdown'><a data-toggle='dropdown' class='dropdown-toggle' href='$menu->link'>$menu->nama_menu
			<b class='caret'></b></a>";
			$dataSubMenu=$this->model->ambilByCol("tbl_menu","titik_kait",$menu->id_menu);
			
			echo "<ul role='menu' class='dropdown-menu'>	";
			foreach($dataSubMenu as $subMenu)
			{
				$x=0;
			$jabatan2=$this->model->ambilByCol("tbl_jabatan_pegawai","niy",$niy);
	$hakAkses2=$this->model->ambilByCol("tbl_hak_akses","id_menu",$subMenu->id_menu);
	foreach($jabatan2 as $jab ){
		foreach($hakAkses2 as $hak)
		{
		
	if($jab->id_jab == $hak->id_jab){
		$x++;
	}
		}
	}
	$x=1;
	if($x>0){
			echo '<li><a href="'.site_url('controller/show/'.$subMenu->link).'">'.$subMenu->nama_menu.'</a></li>'; 
	}
			}
			echo "</ul></li>";
		
		}
	}
	}
?>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Settings</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tabel Master <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                         <?php
				
			foreach ($tables as $table)
				{
  				echo '<li><a href="'.site_url('controller/show/'.$table).'">'.$table.'</a></li>';
				} 
				?>
                        
                        </li>
                    </ul>
                </li>
            </ul>
      
    </nav>
     

</div>
</div>

</body>


</html>