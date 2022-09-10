<?php
require_once "conn.php";

$err = "";
$ok = "";
if (isset($_POST['register']))
{
	
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$err = "Kullanıcı adı veya şifre boş.";
        die();
	}
	
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	$password = hash("sha256", $password);
	$query    = "INSERT into `users` (username, password)
                     VALUES ('$username', '$password')";
	$result   = mysqli_query($conn, $query);
	
	if ($result)
	{
		$ok = "Başarıyla kayıt olundu.";
	}
	else
	{
		$err = "Tekrar deneyin.";
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
    <h5 class="card-title">Sign up</h5>
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
      <input type="submit" name="register" class="fadeIn fourth" value="Sign Up">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        Have an account already?
        <a class="underlineHover" href="login.php">Sign In</a>
    </div>

  </div>
</div>