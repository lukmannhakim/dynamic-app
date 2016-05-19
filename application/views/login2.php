<html>
<head>
<?php
$this->load->helper('url');?>
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
  <div class="row"> 
<div class=".col-xs-6">
<form class="form-horizontal" role="form"> 
   <div class="form-group"> 
      <label for="firstname" class="col-sm-2 control-label">First Name</label> 
      <div class="col-sm-10"> 
         <input type="text" class="form-control" id="firstname"  
            placeholder="Enter First Name"> 
      </div> 
   </div> 
   <div class="form-group"> 
      <label for="lastname" class="col-sm-2 control-label">Last Name</label> 
      <div class="col-sm-10"> 
         <input type="text" class="form-control" id="lastname"  
            placeholder="Enter Last Name"> 
      </div> 
   </div> 
   <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"> 
               <div class="checkbox"> 
            <label> 
               <input type="checkbox"> Remember me 
            </label> 
         </div> 
      </div> 
   </div> 
   <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"> 
         <button type="submit" class="btn btn-default">Sign in</button> 
      </div> 
   </div> 
</form> 
</div>
</div>
      </div>
</body>
</html>