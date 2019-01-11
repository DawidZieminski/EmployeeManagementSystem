<?php include('header.php'); ?>

 <?php if($this->session->userdata('UserID')): ?>
	<div class="container">



<?php echo form_open_multipart("employee/addContactlDetails/{$result->UserID}", ['class'=>'form-horizontal']);?>
<?php echo form_hidden('UserID', $result->UserID); ?>


		<br></br>
		<div class="row">
			<div class="col-lg-4">
				<legend>Dane pracownika</legend>
				 
				<div class="list-group">
					<a href="">
					<ul class="nav nav-pills flex-column">
					  <li class="nav-item">
					    <a class="nav-link" href="<?php echo base_url("employee/empPersonalDetails/{$result->UserID}") ?>">Dane personalne</a> </li>
					
					  <li class="nav-item">
					    <a class="nav-link active" href="<?php echo base_url("employee/empContactDetails/{$result->UserID}") ?>">Dane kontaktowe</a>
					  </li>

					  <li class="nav-item">
					    <a class="nav-link" href="<?php echo base_url("employee/empJobDetails/{$result->UserID}") ?>">Praca</a>
					  </li>
					 
					</ul>
					</div> 


			</div>
			<div class="col-lg-8">
				<legend>Dane kontaktowe</legend>

				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Adres</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'Adress1', 'class'=>'form-control','placeholder'=>'Adres 1','value'=>set_value('Adress1', $records->Adress1)]);?>
					 <?php else: ?>
					 <?php echo form_input(['name'=>'Adress1', 'class'=>'form-control','placeholder'=>'Adres 1','value'=>set_value('Adress1')]);?>
					 <?php endif; ?>
	                 <?php echo form_error('Adress1','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Adres cd.</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'Adress2', 'class'=>'form-control','placeholder'=>'Adres 2','value'=>set_value('Adress2', $records->Adress2)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'Adress2', 'class'=>'form-control','placeholder'=>'Adres 2','value'=>set_value('Adress2')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('Adress2','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

                <div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Kod pocztowy</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'ZipCode', 'class'=>'form-control','placeholder'=>'Kod pocztowy','value'=>set_value('ZipCode', $records->ZipCode)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'ZipCode', 'class'=>'form-control','placeholder'=>'Kod pocztowy','value'=>set_value('ZipCode')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('ZipCode','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>


				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Miejscowość</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'City', 'class'=>'form-control','placeholder'=>'Miejscowość','value'=>set_value('City', $records->City)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'City', 'class'=>'form-control','placeholder'=>'Miejscowość','value'=>set_value('City')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('City','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Województwo</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'State', 'class'=>'form-control','placeholder'=>'Województwo','value'=>set_value('State', $records->State)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'State', 'class'=>'form-control','placeholder'=>'Województwo','value'=>set_value('State')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('State','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="text" class="col-sm-2 col-form-label">Kraj</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 <?php echo form_input(['name'=>'Country', 'class'=>'form-control','placeholder'=>'Kraj','value'=>set_value('Country', $records->Country)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'Country', 'class'=>'form-control','placeholder'=>'Kraj','value'=>set_value('Country')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('Country','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>        


				<div class="form-group row">
     			 <label for="tel" class="col-sm-2 col-form-label">Nr telefonu</label>
	     		    <div class="col-sm-6">
	     		     <?php if(!empty($records)): ?>
	                 	<?php echo form_input(['name'=>'Mobile', 'class'=>'form-control','placeholder'=>'Nr telefonu','value'=>set_value('Mobile', $records->Mobile)]);?>
	                 <?php else: ?>
	                 	<?php echo form_input(['name'=>'Mobile', 'class'=>'form-control','placeholder'=>'Nr telefonu','value'=>set_value('Mobile')]);?>
	                 <?php endif; ?>
	                 <?php echo form_error('Mobile','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>              

				<div class="form-group row">
     			 <label for="email" class="col-sm-2 col-form-label">Email</label>
	     		    <div class="col-sm-6">
	     		      <?php if(!empty($records)): ?>
	                  	<?php echo form_input(['name'=>'Email', 'class'=>'form-control','placeholder'=>'Email','value'=>set_value('Email', $records->Email)]);?>
	                  <?php else: ?>
	                  	 <?php echo form_input(['name'=>'Email', 'class'=>'form-control','placeholder'=>'Email','value'=>set_value('Email')]);?>
	                  	<?php endif; ?>
	                <?php echo form_error('Email','<div class="text-danger">','</div>'); ?>
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