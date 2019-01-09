<?php include('header.php');?>

<div class="container">
  <?php echo form_open("login/user_login",['calss'=>'form-horizontal'])?>

  <fieldset>

   <legend>Logowanie</legend>
       <?php if($error = $this->session->flashdata('login_response')): ?>
   <div class='row'>
     <div class='col-lg-2'>
      <div class="alert alert-dismissible alert-danger">
    <?php echo $error; ?>
      </div>
     </div>
   </div>
   
   <?php endif; ?>
    <div class="row" >
   
      <div class="col-lg-6">
       <div class="form-group">
        <label for="InputEmail">Adres email</label>
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
      <label for="InputPassword"  control-label">Password</label>
      <div class="col-1g-10">
      <?php echo form_input(['name'=>'Password', 'class'=>'form-control','placeholder'=>'Hasło','type'=>'Password']);?>
        <?php echo form_error('Password','<div class="text-danger">','</div>'); ?>
     
     </div>
     </div>
     </div>
  </div>
     <div >
        <?php echo form_submit(['value'=>'Zaloguj', 'class'=>'btn btn-primary']);?>
  
  </div>
 
  </fieldset>
<?php echo form_close();?>
</div>
<?php include('footer.php');?>

