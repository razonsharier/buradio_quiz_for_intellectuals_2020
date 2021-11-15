<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: login');
 exit;
}
?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
header('Cache-control: no-cache, must-revalidate, max-age=0');

if (empty($_SESSION['regdonepass'])) {
 $_SESSION["regdonepass"] = "display: none";
}

if (empty($_SESSION['error_login'])) {
 $_SESSION["error_login"] = "display: none";
}

if (isset($_POST['login'])) {

 if (!$_POST["mobile"]) {
  $_SESSION['error_login'] = "আপনার মোবাইল নাম্বারটি দিন!";
 } elseif (!$_POST["password"]) {
  $_SESSION['error_login'] = "আপনার পাসওয়ার্ডটি দিন!";
 } elseif (!empty($_POST["mobile"]) && !empty($_POST["password"])) {

  require 'php/db.php';
  $mobile   = mysqli_real_escape_string($db, $_POST['mobile']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password = md5($password);
  $sql      = "SELECT * FROM reg WHERE mobile = '$mobile' AND pass = '$password'";
  $result   = mysqli_query($db, $sql) or die(mysqli_error($db));
  $row      = mysqli_num_rows($result);

  if (1 == $row) //find data into database
  {
   unset($_SESSION["error_login"]);
   $_SESSION['regmobile'] = $mobile;
   $_SESSION['regpass']   = $password;
   echo "<script type='text/javascript'> document.location = 'dashboard'; </script>";
   exit;
  } else {
   $_SESSION['error_login'] = "তথ্য খুঁজে পাওয়া যায় নি! আবার চেষ্টা করুন...";
  }
 }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz for Intellectuals - BURADiO</title>
    <link rel="shortcut icon" href="media/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media screen and (max-width: 425px) {

            .regbutton {
                padding: 10px 15px;
                margin-right: 10px;
            }

            .logbutton {
                padding: 10px 15px;
            }

        }
    </style>
</head>

<body>
    <div id="bodycontainer">
        <!-- body container to centralize elements-->
        <div id="header">
            <!-- header nav bar -->
            <div id="navmenu">
                <div class="left">
                    <a href="home"><img class="logo" src="media/logo.png"></a>
                </div>
                <div class="right">
                    <a class="regbutton" href="registration">রেজিস্ট্রেশন করুন</a>
                </div>
            </div>
        </div>
        <div id="notice">
            <div class="noticetext">
                <p>পূর্বে রেজিস্ট্রেশন না করে থাকলে এখন <a href="registration">রেজিস্ট্রেশন</a> করুন।</p>
            </div>
        </div>
        <div style="<?php echo $_SESSION['regdonepass']; ?>" class="regdonepass">
            <p><?php echo $_SESSION['regdonepass']; ?></p>
        </div>
        <div id="loginfield">
            <div id="formcontainer">
                <h3 style="font-size: 28px;color: #5a6dff;">লগইন</h3>
                <div style="<?php echo $_SESSION['error_login']; ?>" class="errormsg">
                    <p><?php echo $_SESSION['error_login']; ?></p>
                </div>
                <form id="formwidth" action="" method="post">
                    <label>মোবাইল নাম্বারঃ (১১ সংখ্যার)</label>
                    <input name="mobile" type="number" autocomplete="off" maxlength="11">
                    <label>পাসওয়ার্ডঃ</label>
                    <input name="password" type="password" autocomplete="off">
                    <button class="quizbutton" type="submit" name="login">লগইন করুন</button>
                </form>
                <div id="frgtpass" style="margin-top: 35px;">
                    <a style="font-size: 16px;" href="forgetpass">পাসওয়ার্ড ভুলে গিয়েছেন?</a>
                </div>
            </div>
        </div>

    </div>
    <?php
unset($_SESSION["error_login"]);
unset($_SESSION["regdonepass"]);
?>
</body>

</html>