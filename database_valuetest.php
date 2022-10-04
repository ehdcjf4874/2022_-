<?php

	$conn = mysqli_connect(
  		'localhost', 
  		'root',
		'1111',
  		'voice');
			$AP1=-60;
			$AP2=-61;
			$AP3=-59;
			$AP4=-54;
			
			//새로운 값을 추가
			$sql = "SELECT * From fingerprint";
			//$sql = "SELECT * From fingerprint WHERE A8=-50";
			$result = mysqli_query($conn, $sql);
			#print($sql);
			
			//측정된 RSSI값
			//$AP1=$_GET['AP1'];
			//$AP2=$_GET['AP2'];
			//$AP3=$_GET['AP3'];
			//$AP4=$_GET['AP4'];

			$coslist = array();
			while ($row = mysqli_fetch_row($result)){

				
				//코사인 유사도 측정 코드
				$cos=($AP1*$row[2]+$AP2*$row[3]+$AP3*$row[4]+$AP4*$row[5])/
				sqrt(pow($row[2],2)+pow($row[3],2)+pow($row[4],2)+pow($row[5],2))*sqrt(pow($AP1,2)+pow($AP2,2)+pow($AP3,2)+pow($AP4,2));
				
				//배열에 위치 좌표값과 코사인 유사도 삽입
				array_push($coslist,$row[0],$row[1],$cos);
				
			 }
			 print_r($coslist);
			//가장 큰 값이 현재 위치이므로 가장 큰 값 찾기
			$Highvalue=(max($coslist));

			//가장 큰 값의 인덱스 찾기
			$Highvalue_Index=(array_search($Highvalue,$coslist));
			print("현재 위치:");
			print("(");
			print($coslist[$Highvalue_Index-2]);
			print(",");
			print($coslist[$Highvalue_Index-1]);
			print(")");
?>
 