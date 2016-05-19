<html>
<head>
<?php
$this->load->library('javascript');
$this->load->helper('form');
$this->load->helper('url');
$tables = $this->db->list_tables();

?>
 
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
   
<?php

echo '<table class="table table-condensed table-hover">
<thead><tr>';
foreach($column as $col)
	{
		echo '<th>'.$col->name. '</th>';
	}
	echo '<th>Aksi</th>';
	echo '</tr>
	</thead>
	<tbody class="table-striped">';
foreach ($data as $dat)
{
	echo '<tr>';
	foreach($column as $col)
	{ 
	$name=$col->name;
		
		$isFk="";
		$isFK=$this->model->isFK($tbl,$name);
		if($isFK==1)
	{
		echo '<td>'.$this->model->generateFK2($tbl,$name,$dat->$name).'</td>';
	}else{
		echo '<td>'. $dat->$name.'</td>';
	}
	 
	 if($col->primary_key==1)
	 {
	 $pk=$dat->$name ;
	$pk_name=$name;
	 }
	}
	?>
      <td>
   <a href="<?php echo base_url()?>index.php/controller/form_update/<?php echo $tbl ?>/<?php echo $pk_name ?>/<?php echo $pk ?>">
  <i class="glyphicon glyphicon-edit"> </i> </a> 
  <a href="<?php echo base_url()?>index.php/controller/delete/<?php echo $tbl?>/<?php echo $pk_name?>/<?php echo $pk ?>"  onclick= "return confirm('yakin')"> <i class="glyphicon glyphicon-remove"></i></a>  </td>
	</tr>
    <?php
	}
echo '</tbody></table>';
?>
        
        
    <a class="btn btn-success" href="<?php echo site_url('controller/form_input/'.$tbl) ?>"> 
<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
</div>

</body>


</html>