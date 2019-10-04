<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="libs/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="libs/assets/demo/demo.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php

$userSalah = $passSalah = false;

if ( isset($_POST['login']) && $_POST['user']!="" && $_POST['pass']!="" ) {
    // include "php/sesuaikanUmur.php";
	include "php/koneksi.php";
	session_start();

	$username = $_POST['user'];
	$password = $_POST['pass'];
	$sql = "SELECT * FROM user WHERE username ='$username'";
	$res = mysql_query($sql);
	if (!($row = mysql_fetch_assoc($res)) ){
		$userSalah = true;
	}else {
		if ($row['password'] == $password){

			if($row['jabatan'] == "Owner"){
				$_SESSION['username'] = $username;
                header("location:halaman_admin.php");
            }else{
				$_SESSION['username'] = $username;
				header("location:index.php");
            }
            
    	}else{
    		$passSalah = true;
    	}
	}
}
?>
<style type="text/css">

.style1 {color: #999999}
.style2 {
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 18px;
}
.style3 {font-family: "Agency FB"}
</style>
</head>

<body>

    <div class="container ">
        <div class="row ">
            <div class="col-md-4 col-md-offset-4" style="margin-left:auto; margin-right:auto; margin-top:150px">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 align="center" class="panel-title style3">Silahkan Login Dahulu</h3>
                    </div>
                    <div class="panel-body">
					<form class="form-group" action="login.php" method="POST">	
						<fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="user" type="text" autofocus>
                        		<font color="red"><?php if($userSalah) echo "Username tidak ditemukan"; ?></font>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password">
                                <font color="red"><?php if($passSalah) echo "Password salah"; ?></font>
                            </div>
                            <div class="form-group">
								<input class="btn btn-lg btn-success" style="width: 100%;" type="submit" name="login" value="Login">
    						 </div>
    					</fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>