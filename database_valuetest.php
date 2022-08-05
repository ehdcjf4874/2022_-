<?php
	$conn = mysqli_connect(
  		'localhost', 
  		'root',
		'1111',
  		'Voice');
			$sql = "SELECT * From fingerprint";
			
			$result = mysqli_query($conn, $sql);	
			
			//측정된 RSSI값
			//$AP1=$_GET['AP1'];
			//$AP2=$_GET['AP2'];
			//$AP3=$_GET['AP3'];
			//$AP4=$_GET['AP4'];
			$AP1=-61;
			$AP2=-63;
			$AP3=-60;
			$AP4=-46;
			$list = array();
			$list2 = array();
			$list3 = array();
			$list4 = array();
			
			//측정된 RSSI값과 데이터베이스의 RSSI값 비교
			//비교방법: 측정된 RSSI 값과 데이터베이스의 RSSI 값을 각각 모두 뺸 것의 합이 최대일때 좌표위치 출력 
			//합이 최대인 이유는 측정세기가 음수이기 떄문
			//오류 -> 이유: 나와야 되는 측정세기보다 작은 측정세기가 있다면 최대값이 
			//해결방법 -> 0에 가장 가까운 수를 찾으면 해결됨.
			//오류 -> 모든 합을 더하기 때문에 h(x)=y라면 같은 y값을 가지는 값이 있음 ex> 7 0 0 -7
			//해결방법 -> 각각을 비교한다.
			//각각을 비교한 뒤에 각각이 0에 가까운 수라면 AP값에 매칭하고 좌표값을 불러온다.(미해결)
			//https://m.blog.naver.com/PostView.naver?isHttpsRedirect=true&blogId=gtifls&logNo=30046312633 -> 근접, 근사값 구하는 쿼리문 (이것을 사용할 수 도 있음)
			
			//배열에서 근사값구하는 함수
			function getClosest($search, $arr){
				$closest =null;
				foreach ($arr as $item) {
					if ($closest ===null || abs($search - $closest) > abs($item - $search))
					{
						$closest = $item;
					}
				}
				return $closest;
			}

			//배열에 측정세기의 차를 넣는 코드
			while ($row = mysqli_fetch_array($result)){
				array_push($list,($AP1-$row[2]));
				array_push($list2,($AP2-$row[3]));
				array_push($list3,($AP3-$row[4]));
				array_push($list4,($AP4-$row[5]));
				//print_r($list);
				//print("\n");

			}
			//각각 측정세기 비교코드
			print(getClosest(0,$list));
			print(getClosest(0,$list2));
			print(getClosest(0,$list3));
			print(getClosest(0,$list4));
			
?>
 