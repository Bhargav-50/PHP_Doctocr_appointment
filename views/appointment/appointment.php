<!DOCTYPE html>
<html>
<head>
<title>Adding a DateTime Picker with Bootstrap by solodev</title>

    
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
	<style type="text/css">
		.container {
			margin-top: 40px;
		}
		.btn-primary {
			width: 100%;
		}
	</style>

   <!-- Bootsrap datetime picker -->


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> 
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

	<script type='text/javascript'>
		$( document ).ready(function() {
			$('#datetimepicker1').datetimepicker();
		});
	</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    
</head>
<body>
<form action="" method="POST">
<div class="container">
   <div class="panel panel-primary">
      <div class="panel-heading">Schedule an Appointment</div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">First Name</label>
                  <input type="text" class="form-control" name="uname" id="fname">
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">Contact Number</label>
                  <input type="text" class="form-control" name="mobile" id="lname">
               </div>
            </div>
            

            <!-- Bootsrap datetime picker -->


            <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">Start Time</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' class="form-control" onkeyup="datealready(this,'dateError')" name="date"/>
                     <span id="dateError"></span>
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div>
            <!-- <script>
            
            $(function () {

            $('#datetimepicker1').datetimepicker1({

            minDate:new Date()

            });

            });
            </script> -->

            <!-- <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">Select Date</label>
                  <input type="date" class="form-control" name="date" onkeyup="datealready(this,'dateError')">
                  <span id="dateError"></span>
               </div>
            </div>


            <div class="col-md-6">
               <div class="form-group">
               <label class="control-label">Select Time</label><br>
               <select id="cars"  name="time" onkeyup="datealready(this,'dateError')">
               <span id="dateError"></span>
                    <?php 
                        $AllUsers = $this->select('datetime'); 
                        foreach ($AllUsers['Data'] as $key => $value) {  ?>
                        
                            <option value="<?php echo $value->datetime; ?>"><?php echo $value->datetime; ?></option>
                            
                        <?php } ?>
                </select>
               </div>
            </div>  -->



            <div class="col-md-6">
               <div class="form-group">
               <label class="control-label">Select Doctor</label><br>
               <select id="cars"  name="doc_name">
                    <?php 
                        $AllUsers = $this->select('doctor'); 
                        foreach ($AllUsers['Data'] as $key => $value) {  ?>
                        
                            <option value="<?php echo $value->doc_name; ?>"><?php echo $value->doc_name; ?></option>
                            
                        <?php } ?>
                </select>
               </div>
            </div>  
         </div>
         <input type="submit" class="btn btn-primary" value="Registration" name="btn-save">
Note: Our Time slots are <br>
<br>
                           (1) 11:00AM TO 12:00PM <br>
                           (2) 12:00AM TO 01:00PM <br>
                           (3) 01:00AM TO 02:00PM <br>
                           (4) 05:00AM TO 07:00PM <br>
                           (5) 07:00AM TO 09:00PM <br>
<br>
If you will not select this slots then your appointment automatically declined.

      </div>
   </div>
</div>
</form>
		
</body>
</html>

<script>

function datealready(e,spid){

$.ajax({
    url:"datealready",
    method: 'POST',
    data:{
        date: e.value
    },
    success: function(response){
        var ObjRes = JSON.parse(response)
        console.log(ObjRes.Data);
        if (ObjRes.Data !=0) {
            $("#"+spid).html("Slot booked please select time after 1 hour");
        }else{
            $("#"+spid).html("valid");
        }
        
    }
})
}

</script>

