<?php
	$conn = mysqli_connect(
  		'localhost', 
  		'root',
		'1111',
  		'Voice');
			$sql = "SELECT * From fingerprint";
			
			$result = mysqli_query($conn, $sql);	
			
			//측정된 RSSI값
			$AP1=$_GET['AP1'];
			$AP2=$_GET['AP2'];
			$AP3=$_GET['AP3'];
			$AP4=$_GET['AP4'];
			
			// 넘겨줄 변수 초기화
			$B0=False;
			$A8=False;
			$C8=False;

			//만약 mysql의 RSSI값이 측정된 RSSI값과 같다면
			//범위는 가로2m, 세로1m간격으로 하였음
 
			//BO에 작품이 있고 만약 그 근처에 사람이 있을때(B0에 있는 작품을 보고 있을 때)
			if ((-50 >=$AP1 && -58<=$AP1) && (-38 >=$AP2  &&  -52<=$AP2) && ( -65>=$AP3 && -70 <=$AP3) && (-63 >=$AP4 && -69<=$AP4)) 
			$BO=True;
			
			//A8에 작품이 있고 만약 그 근처에 사람이 있을때(B0에 있는 작품을 보고 있을 때)
			else if((-38>=$AP1 && -49<=$AP1) && (-51 >=$AP2  &&  -56<=$AP2) && ( -63>=$AP3 && -70 <=$AP3) && (-65 >=$AP4 && -70<=$AP4)) 
			$A8=TRUE;
			
			//C8에 작품이 있고 만약 그 근처에 사람이 있을때(B0에 있는 작품을 보고 있을 때)
			else if ((-58 >=$AP1 && -62<=$AP1) && (-61 >=$AP2  &&  -70<=$AP2) && ( -30>=$AP3 && -56 <=$AP3) && (-57 >=$AP4 && -61<=$AP4)) 
			$C8=TRUE;
			
?>
 