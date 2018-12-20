$(".building").change(function()
{
  var id = $(this).val();
  var dataString = 'id='+ id;

  $.ajax
    ({
         type: "POST",
         url: "ajax_model.php",
         data: dataString,
         cache: false,
         success: function(html)
         {
            $('#numberHall').html('');
            $("#numberHall").append(html);
            $("#numberHall").selectpicker("refresh");
         }
    });
});

$(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
})


function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return false;
    return true;
}  


function tableEQ() {

 $.ajax
    ({
         type: "POST",
         url: "insert.php",
         data: {Building2_licz: $('#building_select_B').val().length, Building2:  $('#building_select_B').val(), 
         TypeHallLicz: $('#typeHall').val().length, TypeHall_:  $('#typeHall').val(),
         Capacity:  $('#capacityHall').val(),
         cbqProjectorHDMI: $('#cbqProjectorHDMI').is(":checked"),
        cbqProjectorHDMI2: $('#cbqProjectorHDMI2').is(":checked"),
        cbqHangers:  $('#cbqHangers').is(":checked"),
        cbqWhiteboard: $('#cbqWhiteboard').is(":checked"),
        cbqClime:  $('#cbqClime').is(":checked"),
        cbqWifi:  $('#cbqWifi').is(":checked"),
        cbqVisualizer:  $('#cbqVisualizer').is(":checked"),
        cbqInteractiveWhiteBoard: $('#cbqInteractiveWhiteBoard').is(":checked"),
        
     
        },
         cache: false,
         success: function(html)
         {
            $("#tableEqipment").html('');
            $("#tableEqipment").append(html);
            $("#tableEqipment").selectpicker("refresh");
         }
    
});

 }

function time_Search2() {
 

 $.ajax
    ({
         type: "POST",
         url: "time.php",
         data: {Building1: $('#building').val(), 
         numberHall:  $('#numberHall').val(),
         data_kal:  $('#date').val()

        },
         cache: false,
         success: function(html)
         {
            $("#tabletime2").html('');
            $("#tabletime2").append(html);
            $("#tabletime2").selectpicker("refresh");
         }
    
});

}



