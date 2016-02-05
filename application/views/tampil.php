<html>
<body>
<?php
$this->load->library('javascript');
$this->load->helper('form');
$this->load->helper('url');

echo '<table border="1"><tr>';
foreach($column as $col)
	{
		echo '<th>'.$col->name. '</th>';
	}
	echo '<th>Aksi</th>';
	echo '</tr>';
foreach ($data as $dat)
{
	echo '<tr>';
	foreach($column as $col)
	{ 
	$name=$col->name;
	 echo '<td>'. $dat->$name.'</td>';
	 if($col->primary_key==1)
	 {
	 $pk=$dat->$name ;
	$pk_name=$name;
	 }
	}
	?>
      <td>
   <a href="<?php echo base_url()?>index.php/controller/form_update/<?php echo $tbl ?>/<?php echo $pk_name ?>/<?php echo $pk ?>">
   update</a> <a href="<?php echo base_url()?>index.php/controller/delete/<?php echo $tbl?>/<?php echo $pk_name?>/<?php echo $pk ?>"  onclick= "return confirm('yakin')"> delete</a>  </td>
	</tr>
    <?php
	}
echo '</table>';
?>
</body>


</html>