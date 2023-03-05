<?php
	session_start();
	require_once 'DBconnection.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			try{
				$username = $_POST['username'];
				// md5 encrypted
				// $password = md5($_POST['password']);
				$password = $_POST['password'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `member` VALUES ('$username', '$password')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Tạo tài khoản thành công.","alert"=>"info");
			$conn = null;
			header('location:login.php');
		}else{
			echo "
				<script>alert('Vui lòng điền đầy đủ thông tin!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}
?>