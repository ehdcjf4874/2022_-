<?php
  
  $AP1 = $_GET["AP1"];
  $AP2 = $_GET["AP2"];
  $AP3 = $_GET["AP3"];
  $AP4 = $_GET["AP4"];



  $result = array($AP1,  $AP2, $AP3, $AP4);
  echo json_encode(array("location"=>$result));
?>