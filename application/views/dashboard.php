<?php include('header.php');?>

<div style="margin-top:25px; ">
 <div class="container">


 </div>

 <div>
 <br>    <?php if($response = $this->session->flashdata('employee_add')): ?>
    <div   class="container">
   <div class='row'>
     <div class='col-sm-12'>
      <div class="alert alert-dismissible alert-success">
    <?php echo $response; ?>
      </div>
     </div>
   </div>
      </div>
   <?php endif; ?></br>
 </div>


 <div   class="container">
  <?php echo form_open('employee/deleteEmployee'); ?>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Imię</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Email</th>
      <th scope="col">Typ użytkownika</th>
    </tr>
  </thead>
  <tbody>

    <?php if(count($result)):?>
      <?php foreach($result as $res): ?>
        <tr class="table-active">
          <?php if($res->UserTypeID == 1): ?>
          <td></td>
          <?php else: ?>
           <td><?php echo form_checkbox(['value'=>$res->UserID, 'name'=>'UserID[]','class'=>'checkbox']); ?></td>
          <?php endif; ?>

       
         

           <td scope="row"><?php echo anchor("employee/empPersonalDetails/{$res->UserID}", $res->FirstName);  ?></td>
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
  <div>
  <input type="submit" value="Usuń" class="btn btn-danger" onclick="return confirm('Czy jesteś pewny?')">
 </div>
 </div>
 <?php echo form_close(); ?>
</div>
<?php include('footer.php');?> 