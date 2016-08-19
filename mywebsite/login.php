<!doctype html>
<html>
	<head>
		<title>login</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<form action="add_user.php" method="GET">
			<ul>
				<li><label for="username">User name:</label><input type="text" id="username" name="username" size="25"></li>
				<li><label for="password">password:</label><input type="text" id="password" name="password" size="25"></li>
				<li><label for=""><input type="submit" name="submit" value="submit"></label></li>
			</ul>
		</form>
	</body>
</html>

<?php
	session_start();	
	//neu da ton tai cac bien session user va pass
	//dieu huong den trang manage_user.php
	if (isset($_SESSION['userid'])) {
		header("location:     manage_user.php");
	 	# code...
	 } 
	//neu nut submit duoc an
	if (isset($_REQUEST['submit'])) {
		//kiem tra truong user name
		$u = '';
		if ( $_REQUEST['username'] ==  null) {
			echo 'please enter  your name<br>';
		}
		else{
			$u = $_REQUEST['username'];
		}
		// kiem tra truong password
		$p = '';
		if ( $_REQUEST['password'] == null ){
			echo 'please enter  your pass';
		}
		else{
			$p = $_REQUEST['password'];
		}

		//neu da nhp ca name va pass
		if ($u && $p) {
			$conn = mysql_connect("localhost","root","") or die("can not  connect database");
			mysql_select_db("project", $conn);
			$sql="select * from user where username= '$u' and password= '$p'";
		  	$query=mysql_query($sql);
		  	if(mysql_num_rows($query) == 0)
		  	{
		   	echo "Username or password is not correct, please try again";
		  	}
		  	else
		  	{
		   	$row=mysql_fetch_array($query);
		   	
		   	$_SESSION['userid'] = $row['id'];
		   	$_SESSION['level'] = $row['level'];
		 	echo "thanh cong";
		 	}
		}
	}
 ?>