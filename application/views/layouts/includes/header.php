
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>The GamingPlace</title>
	
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<a href="<?php echo base_url()?>">The GamingPlace</a>
        </div>
        
        
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url()?>">Home</a></li>
            <li><a href="<?php echo base_url()?>users/register">Create Account</a></li>
           
          </ul>
          
          <?php if(!$this->session->userdata('logged_in')):?>
           <form method="post" action="<?php echo base_url();?>users/login" class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="username" type="text" class="form-control" placeholder="Enter User Name">
        </div>
         <div class="form-group">
          <input type="password" type="password" class="form-control" placeholder="Enter Password">
        </div>
        <button name="submit" type="submit" class="btn btn-default">Login</button>
      </form>
      <?php else:?>
      <form method="post" action="<?php echo base_url(); ?>users/logout" class="navbar-form navbar-right"">
						<button name="submit" type="submit" class="btn btn-default">Logout</button>
					</form>
      <?php endif?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php $this->load->view('layouts/includes/sidebar')?>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
					<div class="panel-heading panel-heading-green">
						<h3 class="panel-title">The Gaming Place</h3>
					</div>
					<div class="panel-body">