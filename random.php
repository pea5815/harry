<?php
	for ($i = 1; $i <= 12; $i++) { //ระบุจำนวนที่ต้องการคือ 12 หลัก
        $cards[] = mt_rand(1, 50); 
		$cards = array_unique($cards);//สำหรับตัดตัวเลขที่ซ้ำออก
    } 
 
	    $count_arr=count($cards); //นับจำนวนตัวเลขใน Array
		echo $count_arr."<br>"; 

    foreach ($cards as $cards) { 
		echo $cards.","; 
 	}
?>