<html>
<body>
<?php
echo '<table border="1">';
$this->load->helper('form');
$this->load->model('model');
echo form_open('controller/submit/'.$tbl);
foreach($data as $dat)
{
	foreach($column as $col)
	{
		$name=$col->name;
		echo '<tr><td>'.$col->name.'</td><td>';
		$isFk="";
		$isFK=$this->model->isFK($tbl,$name);
		if($isFK[status]==1)
		{
	
		$query= $this->model->generateFK($tbl,$name);

	
		}
		
			
		if($col->type=='text' || $col->type=='varchar'){
	$data = array(
              'name'        => $col->name,
              'id'          => $col->name,
              'value'       => $dat->$name,
          
            );
			echo form_input($data);
		}
		if($col->type=='enum')
		{
			$enum=$col->enum;	
			$options="";
	for( $i=1;$i<$col->enum[0];$i++)
	{
	$options[$enum[$i] ]=$enum[$i];
	}
	echo form_dropdown($col->name, $options);	
		}
		
		if($col->type=='date')
		{
				$data = array(
              'name'        => $col->name,
              'id'          => $col->name,
              'value'       => $dat->$name,
          
            );
		echo form_date($data);
		}
	
	echo '</td></tr>';
	}
}

	
echo '<tr><td colspan=2 >'.form_submit('mysubmit', 'Submit Post!').'</td></tr>';
echo '</table>';
?>
</body>


</html>