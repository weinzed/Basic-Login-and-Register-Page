<?php

require_once "conn.php";

$err = "";
$ok = "";
if (isset($_POST['username']) && isset($_POST['password']))
{

    function validate($data)
	{
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data); 
       return $data;
    }
	
	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);
	
	if(empty($uname))
	{
        $err = "Kullanıcı adı boş olamaz.";
    }
	elseif(empty($pass))
	{
        $err = "Şifre boş olamaz.";
    }

	else
	{
		$passmd5 = hash("sha256", $pass);

		$sql = "SELECT * FROM users WHERE username='$uname' AND password='$passmd5'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) === 1)
		{
			$row = mysqli_fetch_assoc($result);
			if ($row['username'] === $uname && $row['password'] === $passmd5)
			{
				session_start();
				
                $ok = 'Giriş yapıldı.';
			}
			else
			{
				$err = "Kullanıcı adınız veya şifreniz yanlış.";
			}
		}
		else
		{
			$err = 'Kullanıcı adınız veya şifreniz yanlış.';
		}
    }
		
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="style.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <br>
    <h5 class="card-title">Sign in</h5>
    </div>

    <!-- Login Form -->

    <?php
    if(!empty($ok))
    {
        echo '<script>Swal.fire("Başarılı!","'.$ok.'", "success")</script>';
    }
    if(!empty($err))
    {
       echo '<script>Swal.fire("Hata!","'.$err.'", "error")</script>';
    }
    ?>
    <form method="post">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username:">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password:">
      <br>
      <br>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        Don't have an account yet?
        <a class="underlineHover" href="register.php">Sign Up</a>
    </div>

  </div>
</div>