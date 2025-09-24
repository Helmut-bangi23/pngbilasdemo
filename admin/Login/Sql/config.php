
<?php

// servername => localhost
		// username => root
		// password => empty
		// database name => ecommercedb
        
$conn = mysqli_connect("localhost", "root", "", "ecommercedb");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

?>