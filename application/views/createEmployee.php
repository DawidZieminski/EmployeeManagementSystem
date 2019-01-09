<?php include('header.php'); ?>

<div class="container">
  <?php echo form_open("employee/insertEmployee",['calss'=>'form-horizontal'])?>
<br></br>
  <fieldset>
<br></br>
   <legend>Dodaj pracownika</legend>
    
    <div class="row" >
   
      <div class="col-lg-6">
       <div class="form-group">
        <label for="InputFirstName"  class="col-lg-3 control-label">Imię</label>
        <div class="col-1g-10">
         <?php echo form_input(['name'=>'FirstName', 'class'=>'form-control','placeholder'=>'Imię','value'=>set_value('FirstName')]);?>
           <?php echo form_error('FirstName','<div class="text-danger">','</div>'); ?>
        </div>
       </div>
      </div>
       <div class="col-lg-6">
          
        </div>
      </div>

    <div class="row" >
   
      <div class="col-lg-6">
       <div class="form-group">
        <label for="InputLastName"  class="col-lg-3 control-label">Nazwisko</label>
        <div class="col-1g-10">
         <?php echo form_input(['name'=>'LastName', 'class'=>'form-control','placeholder'=>'Nazwisko','value'=>set_value('LastName')]);?>
           <?php echo form_error('LastName','<div class="text-danger">','</div>'); ?>
        </div>
       </div>
      </div>
       <div class="col-lg-6">
          
        </div>
      </div>

       <div class="row" >
   
      <div class="col-lg-6">
       <div class="form-group">
        <label for="InputEmail"  class="col-lg-3 control-label">Adres email</label>
        <div class="col-1g-10">
         <?php echo form_input(['name'=>'Email', 'class'=>'form-control','placeholder'=>'Email','value'=>set_value('Email')]);?>
           <?php echo form_error('Email','<div class="text-danger">','</div>'); ?>
        </div>
       </div>
      </div>
       <div class="col-lg-6">
          
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
      		<label  control-label">Password</label>
     	  <div class="col-1g-10">
      		<?php echo form_input(['name'=>'Password', 'class'=>'form-control','placeholder'=>'Hasło','type'=>'Password','value'=>set_value('Password')]);?>
       		 <?php echo form_error('Password','<div class="text-danger">','</div>'); ?>
     	  </div>
         </div>
        </div>
       </div>

           <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
      		<label for="InputUserTypeID"  control-label">Stanowisko</label>
     	  <div class="col-1g-10">
     	  	<select class="form-control" name="UserTypeID">
              <option> </option>
     	  		<option value=<?php echo $result; ?> >Employee</option>
     	  	</select>
      		
       		 <?php echo form_error('UserTypeID','<div class="text-danger">','</div>'); ?>
     	  </div>
         </div>
        </div>
       </div>

     <div class="col-lg-10 col-lg-offset-2">
        <?php echo form_submit(['value'=>'Utwórz', 'class'=>'btn btn-primary']);?>
  
  </div>
 
  </fieldset>
<?php echo form_close();?>
</div>

<?php include('footer.php'); ?>

