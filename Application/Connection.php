<?php 
	$conn = mysqli_connect("localhost","root","","ql_ktx");
	if(!$conn){
		echo "Lỗi kết nối DB";
		exit();
	}
	mysqli_query($conn,"set names utf8");

 ?>