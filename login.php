<?php
	session_start();
	require_once ('database/dbhelper.php');
	
	if(!isset($_SESSION["user"])){
		$_SESSION["user"]=0;
		$_SESSION["username"]="Guest";
	}
	else{
		if ($_SESSION["user"]==1){
			header("Location: admin.php");
			exit;
		}
	}
	
	$error = false;
	
	if( isset($_POST['button-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($password)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			//$password = hash('sha256', $password); // password hashing using SHA256
		
			$query='select * from tbl_user where email="' . $email . '"';
			print("querry log: ");
			print($query);
			
			$result=executeResult($query);
			$count=count($result);
			
			if( $count == 1 && $result[0]['password']==$password ) { //correct (registered) email returns only 1 result
				if ($result[0]['admin']==1){
					$_SESSION['user']=1;
					$_SESSION["username"]="ADMIN";
					header("Location: admin.php");
					exit;
				}
				else{
					$_SESSION['user'] = $result[0]['id'];	
					$_SESSION["username"]=$result[0]['username'];
					header("Location: index.php");
					exit;
				}
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}

				
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="main">
      <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post" class="form" id="form-login">
        <h3 class="heading">
          Đăng Nhập
        </h3>
        <p class="desc">Mua sắm đồ điện tử uy tín tại LGP-Shop ❤️</p>

        <div class="spacer"></div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input
			form="form-login"
            id="email"
            name="email"
            type="text"
            placeholder="VD: email@domain.com"
            class="form-input"
          />
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <label for="password" class="form-label">Mật khẩu</label>
          <input
			form="form-login"
            id="password"
            name="password"
            type="password"
            placeholder="Nhập mật khẩu"
            class="form-input"
          />
          <span class="form-message"></span>
        </div>
        <button class="form-submit" form="form-login" name="button-login">Đăng Nhập</button>
      </form>
	  
	  <?php
		if ( isset($errMSG) ) {
			echo "<p>";
			echo $errMSG;
			echo "</p>";
		}
	  ?>
	  
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
