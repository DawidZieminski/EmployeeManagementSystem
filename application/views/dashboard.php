<?php include('header.php');?>
<div style="margin-top:25px; ">
 <div class="container">
  <div class="col-lg-3">
   <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
   <button type="button" class="btn btn-primary">Zarządzaj pracownikami</button>
    <div class="btn-group" role="group">
     <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
     <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">

    	 <li class="dropdown-item" href="#"><?php echo anchor("employee/createEmployee",'Dodaj');?> </li>
    	 <li class="dropdown-item" href="#"><?php echo anchor("employee/editEmployee",'Edytuj');?> </li>
    	 <li class="dropdown-item" href="#"><?php echo anchor("employee/deleteEmployee",'Usuń');?> </li>
    
     </div>
    </div>
   </div>
  </div>

   <div class="col-lg-3">
		<?php echo form_open("", ['class'=>'navbar-form navbr-right', 'role'=>'search']); ?>
		<div class="form_group" style="margin-top:25px">
  		<?php echo form_input(['name'=>'query', 'class'=>'form-control','placeholder'=>'Szukaj']);?>
  		</div>
  	    <?php echo form_submit(['value'=>'Szukaj', 'class'=>'btn btn-primary']);?>
 		<?php echo form_close(); ?>
 		
	</div>

 </div>
 <div class="container" style="margin-top:25px">
 	<?php echo anchor("employee/deleteEmployee",'Usuń', ['class'=>'btn btn-danger']); ?>
 </div>
 <div>
 <br>    <?php if($error = $this->session->flashdata('employee_add')): ?>
   <div class='row'>
     <div class='col-lg-6'>
      <div class="alert alert-dismissible alert-success">
    <?php echo $error; ?>
      </div>
     </div>
   </div>
   
   <?php endif; ?></br>



 </div>
 <div   class="container">
 	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Imię</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Email</th>
      <th scope="col">Stanowisko</th>
    </tr>
  </thead>
  <tbody>

    <?php if(count($result)):?>
      <?php foreach($result as $res): ?>
        <tr class="table-active">
          <?php if($res->UserTypeID == 1): ?>
          <td></td>
          <?php else: ?>
           <td><?php echo form_checkbox(['class'=>'checkbox']); ?></td>
          <?php endif; ?>

       
         

           <td scope="row"><?php echo anchor("employee/empPersonalDetails", $res->FirstName);  ?></td>
           <td scope="row"><?php echo $res->LastName; ?></td>
           <td><?php echo $res->Email; ?></td>
           <td><?php echo $res->NameType; ?></td>
       </tr>
     <?php endforeach; ?>

      <?php else: ?>
        <tr>
          <td>Brak rekordów!</td>
        </tr>
      <?php endif; ?>

   

   
  </tbody>
 </table> 

  
<font size="4"><?php echo $this->pagination->create_links() ?></font>
 
 </div>
</div>
<?php include('footer.php');?>