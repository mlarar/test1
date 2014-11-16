<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Midterm Practice - Program 1</title>
  <meta name="description" content="">
  <meta name="author" content="lara4594">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
  	<h1>Ace of Hearts</h1>
<?php
   $cards=array();
   $players = array("Jim", "Jane", "Joe", "Janet");
	
/*	for ($i=0; $i<4; $i++) {
		$cards[]=rand(1,13);
	}
	for ($i=0; $i<4; $i++) {
		$cards[]=rand(14,26);
	}
	for ($i=0; $i<4; $i++) {
		$cards[]=rand(27,39);
	}
	for ($i=0; $i<4; $i++) {
		$cards[]=rand(40,52);
	} */
	
	for ($i=0; $i<4; $i++) {
	  for ($j=0; $j<4; $j++) {
	  	 $generatedNumber = rand((13*$i)+1,13*($i+1));
		  if(!in_array($generatedNumber, $cards)){
		 	$cards[]= $generatedNumber; 	
		  }else{
		  	$j--;
		  }
	  	  
	  }
	}
	
	if(!in_array(1, $cards)) { //checking whether ace of hearts is already there
		$cards[0]=1; //inserting ace of hearts
	}
	
	shuffle($cards);
	//print_r($cards); //only for testing
	echo "<table>"; 
	$index = 0;
	$aceFound = false;
	for ($i=0; $i<4; $i++) {
	  echo "<tr>";
		echo "<td>" . $players[$i] . "</td>";
	  for ($j=0; $j<4; $j++) {
	  	if($cards[$index]==1){ //checking whether we're displaying the ace of hearts
	  	  echo "<td style=background-color:yellow>" . "<img src='img/" . $cards[$index] . ".png'/>" . "</td>";
			$aceFound = true;
	  	  }else{
	      echo "<td>" . "<img src='http://hosting.csumb.edu/laramiguel/CST336/midterm/practice/img/" . $cards[$index] . ".png'/>" . "</td>";
		}
		$index++;               
	  }
	  echo"<td>";
	  if($aceFound == true)
	  {
	  	echo $players[$i] . " wins";
		$aceFound = false;
	  }
	  echo"</tr>";
	}
	echo "</table>";
	
	
?>

<form>
<input type="submit" value="Deal Again!">
</form>
  </div>
</body>
</html>
