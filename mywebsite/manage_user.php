<?php 
	session_start();
	//sau khi dang nhap thanh cong voi quyen so 2 thi moi vao duoc trang quan ly
	if (isset($_SESSION['userid']) && $_SESSION['level'] == 2) {
		# code...
		//echo "ban da danh nhap thanh cong";

	}
	//neu khong thi vao lai trang dang nhap
	else{
		header("location: login.php");
	}
 ?>
 <!doctype html>
<html>
	<head>
		<title>manage user.php</title>
		<link rel="stylesheet" href="css/style1.css">
	</head>
	<body>
		
	</body>
</html>