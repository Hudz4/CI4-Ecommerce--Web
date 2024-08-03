<html>
<head>
	<title>thriftHub</title>

	<style type="text/css">
		.messagewindow {
			height: 400px;
			border: 1px solid;
			padding: 5px;
			overflow: auto;
		}
		#wrapper {
			margin: auto;
	 
		}

		.window {
		  border: 2px solid #dedede;
		  background-color: #f1f1f1;
		  border-radius: 5px;
		  padding: 10px;
		  margin: 10px 0;
		}

		/* Darker chat container */
		.darker {
		  border-color: #ccc;
		  background-color: #ddd;
		}

		/* Clear floats */
		.window::after {
		  content: "";
		  clear: both;
		  display: table;
		}

		/* Style images */
		.window div {
		  float: left;
		  max-width: 60px;
		  width: 100%;
		  margin-right: 20px;
		  border-radius: 50%;
		}

		/* Style the right image */
		.window div.right {
		  float: right;
		  margin-left: 20px;
		  margin-right:0;
		}

		/* Style time text */
		.time-right {
		  float: right;
		  color: #aaa;
		}

		/* Style time text */
		.time-left {
		  float: left;
		  color: #999;
		}
	</style>
</head>
<body>
	<div class="container rounded mt-5 ">

	<a href="<?php echo site_url('home') ?>" class="btn btn-success mb-2">Homepage</a>
	<a href="<?php echo site_url('chat') ?>" class="btn btn-success mb-2">Go back</a>

	<div class="messagewindow">
	<?php
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   	if($row->from == $this->session->userdata('id')){
		   		echo "
	   	   		<div class='window'>
	   	   			<div><strong>$row->user</strong>
	   	   			<p>$row->msg</p>
	   	   			</div>
	   	   			<p style='font-size:10px'>$row->time</p>
	   	   		</div>";

		   	}else{
		   		echo "
	   	   		<div class='window darker'>
	   	   			<div class='right'><strong>$row->user</strong>
	   	   			<p>$row->msg</p>
	   	   			</div>
	   	   			<p style='font-size:10px'>$row->time</p>
	   	   		</div>";

		   	}
		   }
		}
   	?>
   	</div>

 		<div class="row">
		<div id="wrapper">
			<?php echo form_open_multipart('home/adminchat_updateMsg','','') ?>
			<?php echo form_hidden('uid',$uid); ?>
			<br/>

			<div id="txt">
			Message: <textarea class="form-control" type="textarea" name="content" id="content" value="" /></textarea>
			</div>
			
			<div id="contentLoading" class="contentLoading">  
			<img src="/images/blueloading.gif" alt="">  
			</div>
			<br/>
			
			<input class="btn btn-success" type="submit" value="Submit"><br/>
			<?php echo form_close(); ?>

		</div>
	</div>	

	 
</body>
</html>
  