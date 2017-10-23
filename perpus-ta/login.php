<?php include 'inc/header.php'; ?>
<?php
	$login = Session::get("memberLogin");
	if ($login == true) {
		header("Location:index.php");
	}
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    	$mLogin= $m->memberlogin($_POST);
	}
?>


	<div class="card" style="width: 30rem; padding: 40px; left: 33%; right: 35%; margin-top: 5%;">
	  <form class="form-signin" action="" method="POST">
	  	<?php 
	  		if (isset($mLogin)) {
	  			echo $mLogin;
	  		}
	  	?>
	    <h2 class="form-signin-heading">Login User</h2>
	    <label for="inputEmail" class="sr-only">Username</label>
	    <input type="text" class="form-control" name="nim" placeholder="Nim" required autofocus><br>
	    <label for="inputPassword" class="sr-only">Password</label>
	    <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
	    <div class="checkbox" style="padding: 10px;">
	      <label>
	        <input type="checkbox" value="remember-me"> Remember me
	      </label>
	    </div>
	    <input class="btn btn-lg btn-primary btn-block" name="login" type="submit" value="Login" />
	  </form>
	</div>
<?php include 'inc/footer.php'; ?>