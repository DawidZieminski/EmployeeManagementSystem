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
    <tr class="table-primary">
    
      <th scope="col">Nazwa zlecenia</th>
      <th scope="col">Data</th>
      <th scope="col">Liczba godzin</th>
     
    </tr>
  </thead>
  <tbody>


    <?php if(count($tabledata)):?>
      <?php foreach($tabledata as $res): ?>
     
  

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

              <tr class="table-primary">
      
           <td scope="row">Suma godzin</td>
           <td scope="row"></td>
            <?php if(count($chartdata)):
            	$suma=0;
    foreach($chartdata as $res): 
     
     $suma= $suma+$res->Hours;
  
endforeach; 
 endif; ?>
       
      
           <?php if(count($tabledata)):?>
           <td><?php echo $suma; ?></td>
         <?php else: ?>
        <td><?php echo $suma=0; ?></td>
  <?php endif; ?>
       
         
      

        </tbody>
 </table> 


  <?php if(count($chartdata)):
  		$data1 = '';
		$data2 = '';

       foreach($chartdata as $res): 
    
  		$data1 = $data1 . '"'. $res->DateWork.'",';
		$data2 = $data2 . '"'. $res->Hours.'",';
	
  endforeach; 
	$data1 = trim($data1,",");
	$data2 = trim($data2,",");

      ?>

       
      <?php endif; ?>

	<canvas id="chart"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'bar',
		        data: {
		            labels: [<?php echo $data1; ?>],
		            datasets: 
		            [{
		                label: 'Liczba godzin',
		                data: [<?php echo $data2; ?>],
		                
		                borderWidth: 3,
				            fill: true,
				            lineTension: 0.3,
				            backgroundColor: "rgba(75,192,192,0.4)",
				            borderColor: "rgba(75,192,192,1)",
				            borderCapStyle: 'butt',
				            borderDash: [],
				            borderDashOffset: 0.0,
				            borderJoinStyle: 'miter',
				            pointBorderColor: "rgba(75,192,192,1)",
				            pointBackgroundColor: "#fff",
				            pointBorderWidth: 10,
				            pointHoverRadius: 5,
				            pointHoverBackgroundColor: "rgba(75,192,192,1)",
				            pointHoverBorderColor: "rgba(220,220,220,1)",
				            pointHoverBorderWidth: 5,
				            pointRadius: 1,
				            pointHitRadius: 10,
				    
				            spanGaps: false,
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: true}], xAxes: [{autoskip: true, maxTicketsLimit: 220}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
</div>





				
<?php echo form_close(); ?>
	
<?php else: ?>
	<?php Redirect('', false); ?>
<?php endif; ?>
<?php include('footer.php'); ?>