<?php
require_once('core/init.php');
require_once('inc/header.php');
require_once('inc/nav.php');

if(isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['email']) and !empty($_SESSION)){
    redirect('index.php');

}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer();



?>

<?php
$user = new user();
$errorsMsg = array();


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submit"])) {

    $email = $_POST['email'];



    //validate
    //check if fields are empty.
    if (empty($email)) {
        array_push($errorsMsg, "Please fill all field.");
    }
    //check email validate.
    elseif (!checkEmail($email)) {
        array_push($errorsMsg, "Please enter a valid email.");
    } else {

        $result = $user->existsEmail($email);

        if (!$result) {
            array_push($errorsMsg, "We did't find your email.");
        } else {

            /*
        check if email is exists.
        if email exists send to user email verify code using php mailer.
    */
            $verifyCode = rand(10000, 100000); //generate random number 
            $user->updateVerifyCode($verifyCode, $email); //insert or update VerifyCode 
            $_SESSION['email'] = $email; //store email in session after check.
            try {

                $mail->isSMTP();
                //Define smtp host
                $mail->Host = "smtp.gmail.com";
                //Enable smtp authentication
                $mail->SMTPAuth = true;
                //Set smtp encryption type (ssl/tls)
                $mail->SMTPSecure = "tls";
                //Port to connect smtp
                $mail->Port = "587";
                //Set gmail username
                $mail->Username = PHPMailerEMAIL;
                //Set gmail password
                $mail->Password = PHPMailerPASSWORD;
                //Email subject
                $mail->Subject = "Verify code from FILLER";
                //Set sender email
                $mail->setFrom('Sender Email who will send email');
                //Enable HTML
                $mail->isHTML(true);
                //Attachment
                //$mail->addAttachment('img/attachment.png');
                //Email body
                $mail->Body = "<p>You'r Verify code is:</p>" . $verifyCode;
                //Add recipient
                $mail->addAddress($email);
                //Finally send email
                $mail->send();

                redirect("codeVerify.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}

?>





<!--Home-Section-->

<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


    <div class="card myCard">
        <div class="card-header">
            <h1 class="text-center">Email verify</h1>
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
                    <input type="email" class="form-control" id="userEmail" name="email" placeholder="Email" required>
                    <div class="invalid-feedback">Please check your email.</div>
                    <div class="valid-feedback">Looks good!</div>
                </div>


                <div class="m-3 d-grid gap-2">
                    <button class="btn btn myBg1" type="submit" name="submit">Find</button>
                </div>


            </form>
        </div>
    </div>



</div>


<!--End Home-Section-->



<?php
require_once('inc/footer.php');
?>