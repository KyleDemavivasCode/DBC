<?php
  include "core/connect.ini";
  include "query/useraccounts.qry";
  
  $usrobj=new USERACCOUNTS();
  
  if(isset($_POST['username']))
     $re=$usrobj->verify_user($db1,$_POST['username'],$_POST['password']);
  
?>  
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SIGN IN</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Procurement System</b></a>
            <small>Sir Gary Sana Pasado Kami</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="index.php" method="POST">
                    <div class="msg">Tinapos ko to habang nakain HAHAHA</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="5" placeholder="Password" required>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-block btn-lg bg-blue waves-effect" value="SIGN IN">
                </form>
				<?php
				  if(isset($_POST['username']))
				  {	  
					if($re==1){
						header("Location: menu.php");
						echo 'Login Successful!';
					}
					else
					{
					echo 'User does not exist';	
					}
				  }	
				?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-up.js"></script>
</body>

</html>