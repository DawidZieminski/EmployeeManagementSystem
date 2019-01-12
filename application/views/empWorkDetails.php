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
					    <a class="nav-link" href="<?php echo base_url("employee/empPersonalDetails/{$result->UserID}")?>">Dane ogólne</a> </li>
					
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
     			 <label for="text" class="col-sm-2 col-form-label">Projekt</label>
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
</div>


<div class="container">
 <table class="table table-hover">
  <thead>
    <tr>
    
      <th scope="col">Nazwa zlecenia</th>
      <th scope="col">Data</th>
      <th scope="col">Liczba godzin</th>
     
    </tr>
  </thead>
  <tbody>


    <?php if(count($chartdata)):?>
      <?php foreach($chartdata as $res): ?>
        <tr class="table-active">
      
           <td scope="row"><?php echo $res->Project;  ?></td>
           <td scope="row"><?php echo $res->DateWork; ?></td>
           <td><?php echo $res->Hours; ?></td>
         
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



<canvas id="myChart"></canvas>
<script>
	Chart.defaults.global.defaultFontColor = 'white';
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [1,2,3,"12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019","12.12.2019",29,30,31],
        datasets: [{
            label: "Wrzesień",
            color:'rgb(1, 1, 1)',
            backgroundColor: 'rgb(1, 1, 1)',
            borderColor: 'rgb((111, 31, 93)',
            data: [1	,	2	,	3	,	4	,	5	,	6	,	7	,	8	,	9	,	10	,	11	,	12	,	13	,	14	,	15	,	16	,	17	,	18	,	19	,	20	,	21	,	22	,	23	,	24	,	25	,	26	,	27	,	28	,	29	,	30	,	31
],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
				
<?php echo form_close(); ?>
	

<?php else: ?>
	<?php Redirect('', false); ?>
<?php endif; ?>

<?php include('footer.php'); ?>