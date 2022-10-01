<?php
require_once('core/init.php');
require_once('inc/header.php');
titleChanger("Code verify");//page title
require_once('inc/nav.php');

if (!isset($_SESSION['email'])) { //
  redirect('login.php');
}

?>


<?php
$user = new user();
$errorsMsg = array();


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submit"])) {

  $email = $_SESSION['email'];
  $verifyCode = $_POST['verifyCode'];
  $newPassword = $_POST['newPassword'];


  //validate
  //check if fields are empty.
  if (empty($verifyCode) or empty($newPassword)) {
    array_push($errorsMsg, "Please fill all field.");
  }

  //check string length is more than 8 characters.
  elseif (!minLen($newPassword, 8)) {
    array_push($errorsMsg, "The password must be more than 8 characters.");
  }
  //check if email is exists.
  //if no error insert data.
  else {

    if (!$user->checkVerifyCode($verifyCode, $email)) { //check verify code is exist.
      array_push($errorsMsg, "wrong verifyCode.");
    } else {
      $hashPassword = sha1($newPassword);//hash password
      $user->updatePassword($hashPassword, $email); //if no error update password.
      session_destroy(); //delete session
      redirect('login.php'); //redirect to login page
    }
  }
}

?>





<!--Home-Section-->
<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


  <div class="card myCard">
    <div class="card-header">
      <h1 class="text-center">Code verify</h1>
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
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation my-5" novalidate>


        <div class="form-group m-3">
          <input type="num" class="form-control" id="userEmail" name="verifyCode" placeholder="Verify code" required>
          <div class="invalid-feedback">Please check your verify code.</div>
          <div class="valid-feedback">Looks good.</div>
        </div>

        <div class="form-group m-3">
          <input type="num" class="form-control" id="userPassword" name="newPassword" placeholder="New password" required>
          <div class="invalid-feedback">Please check your password.</div>
          <div class="valid-feedback">Looks good.</div>
        </div>


        <div class="m-3 d-grid gap-2">
          <button class="btn btn myBg1" type="submit" name="submit">Change password</button>
        </div>

      </form>
    </div>
  </div>



</div>

<!--End Home-Section-->



<?php
require_once('inc/footer.php');
?>