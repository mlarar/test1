<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>registration</title>
  <meta name="description" content="">
  <meta name="author" content="Miguel Lara">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>


  
</head>

<body>
  <div>
    <header>
      <h1>Registration</h1>
    </header>

    <div>

		<form action="catalog.php" method="post">
			First Name: <input type="text" id="firstName" name="firstName" /><br />
			Last Name:  <input type="text" id="lastName" name="lastName" /><br />
			Email:      <input type="text" id="email" name="email" /><br />
			
			<br />
			Zip code:   <input type="text" id="zip" name="zip" /><br />
			City: <span id="city"> </span><br />
			State:      <select  id="state" name="state"/>
			               <option> Select One </option>
			               <option value="AZ">Arizona</option>
			               <option value="CA">California</option>
			               <option value="NY">New York</option>
			               <option value="TX">Texas</option>
					    </select>
			<br />
			County:     <select id="county"></select><br /><br />
			Username:   <input type="text" id="username" name="username" />
			            <span id="usernameValidation"></span><br />
			Password:  <input type="password" id="password" name="password" />  <br /> 
			Retype Password:  <input type="password" id="password2" name="password2" required="required"/> <br />       
			<input type="submit" />
		</form>
      
    </div>


  </div>

<script>
	$("#zip").change( function(){
	     //alert($(this).val()); //showing the username entered, for testing purposes
	      $.ajax({
            type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
            data: { "zip_code": $(this).val()},
            dataType: "json",
            success: function(data,status) {
                 //alert(data["city"]); //displaying data received, for testing purposes
                 $("#city").html(data["city"]); 
            },
              complete: function(data,status) { //optional, used for debugging purposes
                  alert(status);
              }
        });
	});
	
	$("#state").change( function(){    
		$.ajax({
            type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
            dataType: "json",
            data: { "state": $("#state").val() },
            success: function(data,status) {
                // alert(data);
                 $("#county").html("<option> Select One </option>");
                 for (var i=0; i< data['counties'].length; i++){
                     $("#county").append("<option>" + data["counties"][i].county + "</option>" );
                }

              }
         });  
    });   
    
   
	$("#username").change( function(){
	     //alert($(this).val()); //showing the username entered, for testing purposes
	      $.ajax({
            type: "get",
            url: "usernameLookup.php",
            data: { "username": $(this).val()},
            dataType: "json",
            success: function(data,status) {
               //alert(data["exists"]); //displaying data received, for testing purposes
                if (data["exists"] == "false") {
                     $("#usernameValidation").html("Available!"); 
                     $("#usernameValidation").css("color","green");
                     $("#username").css("background-color","");
                 }
                else {
                        $("#usernameValidation").html("Username already taken!");    
                        $("#username").css("background-color","red");
                        $("#username").focus();
                             
                        $("#usernameValidation").css("color","red");
                 }           

            }
        });  //end Ajax 
      });     
	
</script>
  
</body>
</html>
