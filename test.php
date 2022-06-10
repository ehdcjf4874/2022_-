<?php
	$conn = mysqli_connect(
  		'localhost', 
  		'root',
		'1111',
  		'Voice');
			$sql = "SELECT * From fingerprint";
			
			$result = mysqli_query($conn, $sql);	
			
			//측정된 RSSI값
			$AP1=$_POST['파라미터명'];
			$AP2=$_POST['파라미터명'];
			$AP3=$_POST['파라미터명'];
			$AP4=$_POST['파라미터명'];
			
			// 넘겨줄 변수 초기화
			$X=0;
			$Y=0;

			//만약 mysql의 RSSI값이 측정된 RSSI값과 같다면
			while($row = mysqli_fetch_array($result)){
				if (($row['A8'] >=$AP1+3 ) && $row['A8']<=$AP1+5) && ($row['B0'] =>$AP2+3 && $row['B0']<=$AP2+5) && ($row['C8'] >=$AP3+3 && $row['C0'] <0) && ($row['08'] >0 && $row['08'] <0)) 
				//넘겨줄 변수에 DB의 x,y좌표 대입
				$X=$row['X'],$Y=$row['Y'];
			}
?>
 