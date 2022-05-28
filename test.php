<?php
	$conn = mysqli_connect(
  		'localhost', 
  		'root',
		'1111',
  		'Voice');
			$sql = "SELECT * From fingerprint";

			$result = mysqli_query($conn, $sql);	
			
			while($row = mysqli_fetch_array($result)){
			echo 'IP1:',$row['IP1'].'<br>'.'IP2:',$row['IP2'].'<br>'.'IP3:',$row['IP3'].'<br>';
			}
?>
