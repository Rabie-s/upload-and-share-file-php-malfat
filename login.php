<?php
require_once('core/init.php');
require_once('inc/header.php');
require_once('inc/nav.php');

?>



<?php
$user = new user();
$errorsMsg = array();


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submit"])) {

  $email = $_POST['email'];
  $password = sha1($_POST['password']);


  //validate
  //check if fields are empty.
  if (empty($email) or empty($password)) {
    array_push($errorsMsg, "Please fill all field.");
  }
  //check email validate.
  elseif (!checkEmail($email)) {
    array_push($errorsMsg, "Please enter a valid email.");
  }
  //check string length is more than 8 characters.
  elseif (!minLen($password, 8)) {
    array_push($errorsMsg, "The password must be more than 8 characters.");
  }
  //check if email is exists.
  //if no error insert data.
  else {

    $result = $user->login($email,$password);

    if(!$result){
      array_push($errorsMsg, "Incorrect email or password.");
    }else{
      redirect("index.php");
    }

   
  }
}

?>





<!--Home-Section-->



<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


<div class="card myCard">
    <div class="card-header">
        <h1 class="text-center">Login</h1>
    </div>
    <div class="card-body">
        <?php
            //display error 
            if (isset($errorsMsg)) {
              foreach ($errorsMsg as $error) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            }
            ?> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation my-5"
            novalidate>

            <div class="form-group m-3">
                <input type="email" class="form-control" id="userEmail" name="email" placeholder="Email"
                    required>
                <div class="invalid-feedback">Please check your email.</div>
                <div class="valid-feedback">Looks good!</div>
            </div>

            <div class="form-group m-3">
                <input type="password" class="form-control" id="userPassword" name="password"
                    placeholder="Password" min="8" required>
                <div class="invalid-feedback">Please check your password.</div>
                <div class="valid-feedback">Looks good!</div>
            </div>


            <div class="m-3 d-grid gap-2">
                <button class="btn btn myBg1" type="submit" name="submit">Log-in</button>
            </div>

            <div class="form-group m-3 text-center">
                <label class="d-block"><a class="myColor2" href="<?php echo BU." register.php"; ?>">Create new account</a><label>
            </div>

            <div class="form-group m-3 text-center">
                <label><a class="myColor2" href="<?php echo BU." emailVerify.php"; ?>">Forget your password?</a><label>
            </div>

        </form>
    </div>
</div>



</div>





<!--End Home-Section-->




<?php
require_once('inc/footer.php');
?>