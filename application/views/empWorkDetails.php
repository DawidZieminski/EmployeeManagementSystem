<?php include('header.php'); ?>

 <?php if($this->session->userdata('UserID')): ?>
	<div class="container">



<?php echo form_open_multipart("employee/addWorkDetails/{$result->UserID}", ['class'=>'form-horizontal']);?>
<?php echo form_hidden('UserID', $result->UserID); ?>



		<br></br>

		<div class="row">
			<div class="col-lg-4">
				<legend>Dane pracownika</legend>



				 
				<div class="list-group">
					<a href="">
					<ul class="nav nav-pills flex-column">
					  <li class="nav-item">
					    <a class="nav-link" href="<?php echo base_url("employee/empPersonalDetails/{$result->UserID}") //{$result->UserID}?>">Dane personalne</a> </li>
					
					  <li class="nav-item">
					    <a class="nav-link " href="<?php echo base_url("employee/empContactDetails/{$result->UserID}") ?>">Dane kontaktowe</a>
					  </li>

					  <li class="nav-item">
					    <a class="nav-link active" href="<?php echo base_url("employee/empWorkDetails/{$result->UserID}") ?>">Praca</a>
					  </li>
					 
					</ul>
					</div> 


			</div>
			<div class="col-lg-8">
				<legend>Zlecenie dla pracownika</legend>



				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Project</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'Project', 'class'=>'form-control','placeholder'=>'Project','value'=>set_value('Project', $records->Project)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'Project', 'class'=>'form-control','placeholder'=>'Project','value'=>set_value('Project')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('Project','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

               	<div class="form-group row">
     			 <label for="date" class="col-sm-2 col-form-label">Data prac</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'DateWork', 'type'=>'date', 'class'=>'form-control','placeholder'=>'DateWork','value'=>set_value('DateWork', $records->DateWork)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'DateWork', 'type'=>'date', 'class'=>'form-control','placeholder'=>'DateWork','value'=>set_value('DateWork')]);?>
						<?php endif; ?>
						<?php echo form_error('DateWork','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>


				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Ilość godzin</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'Hours', 'class'=>'form-control','placeholder'=>'Hours','value'=>set_value('Hours', $records->Hours)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'Hours', 'class'=>'form-control','placeholder'=>'Hours','value'=>set_value('Hours')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('Hours','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

			   
<?php if($this->session->userdata('UserID') ==1): ?>
				<div class="form-group row">
     			 <label for="number" class="col-sm-2 col-form-label"></label>
	     		    <div class="col-sm-6">
							<?php echo form_submit(['value'=>'Zapisz', 'class'=>'btn  btn-primary']);?>
	    			</div>
                </div>   
                <?php endif; ?>     
				
<?php echo form_close(); ?>
	</div>

<?php else: ?>
	<?php Redirect('', false); ?>
<?php endif; ?>

<?php include('footer.php'); ?>