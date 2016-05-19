<html>


<body>


<?php
$this->load->library('javascript');
$this->load->helper('form');
$this->load->helper('url');


  
?>
     
 <div id="wrap"> 
<div class="container"> 




<?php
$this->load->helper('form');
$this->load->model('model');
$attributes = array('class' => 'form-horizontal');
echo form_open('controller/submit/'.$tbl,$attributes);

echo "<legend>Data ".$tbl."</legend> ";
?>

   
<?php

	foreach($column as $col)
	{
		$name=$col->name;
		
		$isFk="";
		$isFK=$this->model->isFK($tbl,$name);
		if($isFK==1)
	
	{
		$query= $this->model->generateFK($tbl,$name);
$isFK=0;
			
			$options="";
	foreach ($query as $data)
	{
		
	$options[$data[0]]=$data[1];
	
	}
	
	
	echo '<div class="form-group"> 
	<label class="control-label col-xs-2">'.$col->name.'</label>';
	echo '<div class="col-xs-10">'.form_dropdown($col->name,$options,$dat->$name).'</div></div>';
	
	}else{
		
			
		if($col->type=='text' || $col->type=='varchar'){
	$data = array(
              'name'        => $col->name,
              'id'          => $col->name,
              'value'       => $dat->$name,
          
            );
		echo '<div class="form-group"> <label class="control-label col-xs-2">'.$col->name.'</label>';
		echo '<div class="col-xs-10">'.form_input($data).'</div></div>';
		}
		
		if($col->type=='enum')
		{
			$enum=$col->enum;	
			$options="";
	for( $i=1;$i<$col->enum[0];$i++)
	{
	$options[$enum[$i] ]=$enum[$i];
	}
	
	echo '<div class="form-group"> 
	<label class="control-label col-xs-2">'.$col->name.'</label>';
	echo '<div class="col-xs-10">'.form_dropdown($col->name, $options).'</div></div>';	
		}
		
		if($col->type=='date')
		{
				$data = array(
              'name'        => $col->name,
              'id'          => $col->name,
              'value'       => $dat->$name,
          
            );
	echo '<div class="form-group"> 
	<label class="control-label col-xs-2">'.$col->name.'</label>';
	 echo '<div class="col-xs-10">'.form_date($data).'</div></div>';
		}
	
	}
	
}

	
echo'<div class="form-group"><label class="control-label col-xs-2"></label>
	<div class="col-xs-3"> '. form_submit('mysubmit', 'Submit Post!','class="button btn-primary"').'</div></div>';

?>

</div>

</div>
</body>


</html>