<?php 
	session_start();
	if (isset($_SESSION['userid']) && $_SESSION['level'] == 2) {
		//tai day thuc thi hanh dong dang nhap thanh cong
		echo "xin chao admin<br>";
		//neu nut add new user duoc an
		if (isset($_REQUEST['addnewuser'])) {
			$l = $_REQUEST['level'] + 1;
			//echo $l."<br>";
			//thuc hien hanh dong sau khi nut add user duoc an
			//kiem tra xem truong user name da dien chua
			//neu da duoc dien
			if ($_REQUEST['username'] != null) {
				$u = $_REQUEST['username'];
				//var_dump($u);
				//kiem tra truong pass da dien chua
				//neu da duoc dien
				
				if ($_REQUEST['password'] != null) {
					$p = $_REQUEST['password'];
					//var_dump($p );
					# code...
					//so sanh voi truong  re password
					//neu 2 truong giong nhau
					if ($_REQUEST['password'] == $_REQUEST['repassword']) {
						# code...
						//echo 'pass giong nhau<br>';
						// vao database kiem tra xem user da ton tai chua
						//ket noi den localhost
						$conn = mysql_connect('localhost','root','') or die('can not connect database');
						//ket noi den database
						mysql_select_db('project',$conn);
						//khai bao cau truy van
						$sql = "select * from user where username = '$u'";
						//thuc hien truy van
						$query = mysql_query($sql);
						//kiem tra bang tra ve query
						//neu so ket qua lon hon >=1
						//print_r($query);
						if (mysql_num_rows($query) >= 1) {
							# code...
							//print_r(mysql_num_rows($query));
							echo "user da ton tai<br>";
						}
						//neu so ket qua nho hon 1

						else {
							//neu so ket qua chinh xac  = 0, user chua dang ky
							if(mysql_num_rows($query) == 0)
							{
								//khai bao lenh insert into
								$sql = "insert into user (username, password, level) values ('$u','$p','$l')";
								//thuc hien lenh insert into
								$query = mysql_query($sql);
								// neu thuc hien thanh cong thi echo ban da dang ky thanh cong
								echo "ban da dang ky thanh cong<br>";
							}
						}
					}
					//neu pass khac nhau
					else{
						echo "re password chua dung";
					}
				}
				//neu chua duoc dien
				else{
					echo "moi ban nhap password<br>";
				}
				# code...
			}
			//neu usr name chua duoc nhap
			else{
				echo "moi ban nhap user name<br>";
			}
			
			//neu 2 truong giong nhau thi vao database xem user da toi tai chua
			//neu chua ton tai thi thuc thi cau lenh inser into
			//echo ra ket qua thanh cong
		}
		//neu nut add user khong duoc an
		else{
			//khong lam gi ca
		}
	}
	//neu khong ton tai cac bien session user va level
	//thi dieu huong den trang khac
	else{
		header('location:login.php');
		exit();
	}
 ?>
<!doctype html>
<html>
	<head>
		<title>add user.php</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<form action="" method="GET" >
			<ul>
				<li>
					<label for="level">Level:</label>
					<select name="level" id="level">
						<option value="0">Member</option>
						<option value="1">Admin</option>
					</select>
				</li>
				<li>
					<label for="username">user name:</label>
					<input type="text" name="username" id="username">
				</li>
				<li>
					<label for="password">password:</label>
					<input type="text" name="password" id="password">
				</li>
				<li>
					<label for="repassword">re-password:</label>
					<input type="text" name="repassword" id="repassword">
				</li>
				<li>
					<label for=""><input type="submit" name="addnewuser" value="add new user"></label>
				</li>
			</ul>
		</form>
	</body>
</html>