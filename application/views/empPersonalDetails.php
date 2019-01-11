<?php include('header.php'); ?>

 <?php if($this->session->userdata('UserID')): ?>



	<div class="container">
<?php echo form_open_multipart("employee/addPersonalDetails/{$result->UserID}", ['class'=>'form-horizontal']);?>
<?php echo form_hidden('UserID', $result->UserID); ?>
<?php echo form_hidden('UserTypeID', $result->UserTypeID); ?>

		<br></br>
		<div class="row">
			<div class="col-lg-4">
				<legend>Dane pracownika</legend>
				 
				<div class="list-group">
					<a href="">
					<ul class="nav nav-pills flex-column">
					  <li class="nav-item">
					    <a class="nav-link active" href="<?php echo base_url("employee/empPersonalDetails/{$result->UserID}") ?>">Dane personalne</a> </li>
					
					  <li class="nav-item">
					    <a class="nav-link" href="<?php echo base_url("employee/empContactDetails/{$result->UserID}") ?>">Dane kontaktowe</a>
					  </li>

					  <li class="nav-item">
					    <a class="nav-link" href="<?php echo base_url("employee/empJobDetails/{$result->UserID}") ?>">Praca</a>
					  </li>
					 
					</ul>
					</div> 


			</div>
			<div class="col-lg-8">
				<legend>Dane personalne</legend>

				<div class="form-group row">
     			 <label for="FirstName" class="col-sm-2 col-form-label">Imię</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'FirstName', 'class'=>'form-control','placeholder'=>'Imię','value'=>set_value('FirstName', $records->FirstName)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'FirstName', 'class'=>'form-control','placeholder'=>'Imię','value'=>set_value('FirstName')]);?>
						<?php endif; ?>
						<?php echo form_error('FirstName','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="LastName" class="col-sm-2 col-form-label">Nazwisko</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'LastName', 'class'=>'form-control','placeholder'=>'Nazwisko','value'=>set_value('LastName', $records->LastName)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'LastName', 'class'=>'form-control','placeholder'=>'Imię','value'=>set_value('LastName')]);?>
						<?php endif; ?>
						<?php echo form_error('LastName','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="date" class="col-sm-2 col-form-label">Data ur.</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'DOB', 'type'=>'date', 'class'=>'form-control','placeholder'=>'Data urodzenia','value'=>set_value('DOB', $records->DOB)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'DOB', 'type'=>'date', 'class'=>'form-control','placeholder'=>'Data urodzenia','value'=>set_value('DOB')]);?>
						<?php endif; ?>
						<?php echo form_error('DOB','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="number" class="col-sm-2 col-form-label">Numer konta</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'AccountNumber', 'class'=>'form-control','placeholder'=>'Numer konta bankowego','value'=>set_value('AccountNumber', $records->AccountNumber)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'AccountNumber', 'class'=>'form-control','placeholder'=>'Numer konta bankowego','value'=>set_value('AccountNumber')]);?>
						<?php endif; ?>
						<?php echo form_error('AccountNumber','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="number" class="col-sm-2 col-form-label">Pensja</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'Salary', 'class'=>'form-control','placeholder'=>'Pensja','value'=>set_value('Salary', $records->Salary)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'Salary', 'class'=>'form-control','placeholder'=>'Pensja','value'=>set_value('Salary')]);?>
						<?php endif; ?>
						<?php echo form_error('Salary','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>

				<div class="form-group row">
     			 <label for="number" class="col-sm-2 col-form-label">Premia</label>
	     		    <div class="col-sm-6">
						<?php if(!empty($records)): ?>
						<?php echo form_input(['name'=>'Bonus', 'class'=>'form-control','placeholder'=>'Premia','value'=>set_value('Bonus', $records->Bonus)]);?>
						<?php else: ?>
						<?php echo form_input(['name'=>'Bonus', 'class'=>'form-control','placeholder'=>'Premia','value'=>set_value('Bonus')]);?>
						<?php endif; ?>
	                 <?php echo form_error('Bonus','<div class="text-danger">','</div>'); ?>
	    			</div>
                </div>


                <div class="row">
			<div class="col-lg-1">
		        	<?php echo form_submit(['value'=>'Zapisz', 'class'=>'btn btn-primary']);?>
		 	 	</div></div>
				
<?php echo form_close(); ?>
	</div>

	      <?php else: ?>
<?php Redirect('', false); ?>

  <?php endif; ?>
<?php include('footer.php'); ?>