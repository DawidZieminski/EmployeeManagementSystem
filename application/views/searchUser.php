<?php include('header.php');?>

<div style="margin-top:25px; ">
 <div class="container">

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

    <?php if(count($record)):?>
      <?php foreach($record as $record): ?>
        <tr class="table-active">
          <?php if($record->UserTypeID == 1): ?>
          <td></td>
          <?php else: ?>
           <td><?php echo form_checkbox(['class'=>'checkbox']); ?></td>
          <?php endif; ?>

       
         

           <td scope="row"><?php echo anchor("employee/empPersonalDetails/{$record->UserID}", $record->FirstName);  ?></td>
           <td scope="row"><?php echo $record->LastName; ?></td>
           <td><?php echo $record->Email; ?></td>
           <td><?php echo $record->NameType; ?></td>
       </tr>
     <?php endforeach; ?>

      <?php else: ?>
        <tr>
          <td>Brak rekordów!</td>
        </tr>
      <?php endif; ?>

   

   
  </tbody>
 </table> 

  

 
 </div>
</div>
<?php include('footer.php');?>