<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: registration');
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

if (empty($_SESSION['error_reg1'])) {
 $_SESSION["error_reg1"] = "display: none";
}

if (isset($_POST['registration'])) {

 require 'php/db.php';
 $pname   = htmlspecialchars($_POST['name']);
 $pmobile = htmlspecialchars($_POST['mobile']);
 $pemail  = htmlspecialchars($_POST['email']);
 $pproll  = htmlspecialchars($_POST['roll']);
 $ppass   = htmlspecialchars($_POST['password']);

 $name     = mysqli_real_escape_string($db, $pname);
 $mobile   = mysqli_real_escape_string($db, $pmobile);
 $email    = mysqli_real_escape_string($db, $pemail);
 $roll     = mysqli_real_escape_string($db, $pproll);
 $password = mysqli_real_escape_string($db, $ppass);
 $password = md5($password);
 $sql      = "SELECT * FROM reg WHERE mobile = '$mobile' or email = '$email'";
 $result   = mysqli_query($db, $sql) or die(mysqli_error($db));
 $row      = mysqli_fetch_array($result);

 if (!$_POST["name"]) {
  $_SESSION['error_reg1'] = "আপনার পূর্ণ নামটি দিন!";
 } elseif (!$_POST["mobile"]) {
  $_SESSION['error_reg1'] = "আপনার মোবাইল নাম্বারটি দিন!";
 } elseif (!$_POST["email"]) {
  $_SESSION['error_reg1'] = "আপনার ইমেইলটি দিন!";
 } elseif (!$_POST["roll"]) {
  $_SESSION['error_reg1'] = "আপনার রোল নাম্বারটি দিন!";
 } elseif (!$_POST["password"]) {
  $_SESSION['error_reg1'] = "আপনার পাসওয়ার্ডটি দিন!";
 } elseif (!$_POST["password2"]) {
  $_SESSION['error_reg1'] = "আপনার পাসওয়ার্ডটি পুনরায় দিন!";
 } elseif ($_POST["password"] != $_POST["password2"]) {
  $_SESSION['error_reg1'] = "পাসওয়ার্ডটি মেলেনি!";
 } elseif ($row['mobile'] == $_POST["mobile"]) {
  $_SESSION['error_reg1'] = "এই মোবাইল নাম্বারটি পূর্বেই ব্যবহৃত হয়েছে!";
 } elseif ($row['email'] == $_POST["email"]) {
  $_SESSION['error_reg1'] = "এই ইমেইলটি পূর্বেই ব্যবহৃত হয়েছে!!";
 } elseif ($row['mobile'] != $_POST["mobile"] && $row['email'] != $_POST["email"]) {

  $uid    = rand(1000, 1000000);
  $sql    = "SELECT userid FROM reg WHERE userid = '$uid'";
  $result = mysqli_query($db, $sql);
  $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($uid == $row['userid']) {
   $again = rand(1000, 1000000);
   $uid   = $again;

   if ($uid == $row['userid']) {
    header("registration");
   }
  }

  $sql2  = "INSERT INTO reg (userid, name, mobile, email, roll, pass, step1, marks1, selectionround2, topic, status, marks2, selectionround3, time, link, marks3, questart, quend) VALUES ('$uid', '$name', '$mobile', '$email', '$roll', '$password', '', '0', '', '', '', '0', '', '', '', '0', '', '')";
  $sql22 = "INSERT INTO rank (userid, totalmarks) VALUES ('$uid', '0')";

  if (mysqli_query($db, $sql2)) {
   mysqli_query($db, $sql22);
   $_SESSION['regdonepass'] = "রেজিস্ট্রেশন সম্পূর্ণ হয়েছে!";
   echo "<script type='text/javascript'> document.location = 'login'; </script>";
   exit;
  } else {
   $_SESSION['error_reg1'] = mysqli_error($db);
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
                    <a class="logbutton" href="login">লগইন করুন</a>
                </div>
            </div>
        </div>
        <div id="notice">
            <div class="noticetext">
                <p>পূর্বেই রেজিস্ট্রেশন করে থাকলে <a href="login">লগইন</a>
                    করে নিজ একাউন্টে প্রবেশ করুন।</p>
            </div>
        </div>
        <div id="loginfield">
            <div id="formcontainer">
                <h3 style="font-size: 28px;color: #178e17;">রেজিস্ট্রেশন</h3>
                <div style="<?php echo $_SESSION['error_reg1']; ?>" class="errormsg">
                    <p><?php echo $_SESSION['error_reg1']; ?></p>
                </div>
                <form id="formwidth" action="" method="post">
                    <label>পূর্ণ নামঃ</label>
                    <input name="name" type="text" autocomplete="off">
                    <label>মোবাইল নাম্বারঃ (১১ সংখ্যার)</label>
                    <input name="mobile" type="number" autocomplete="off" maxlength="11">
                    <label>ইমেইলঃ</label>
                    <input name="email" type="email" autocomplete="off">
                    <label>বরিশাল বিশ্ববিদ্যালয়ে আপনার ক্লাস রোলঃ</label>
                    <input name="roll" type="text" autocomplete="off">
                    <label>পাসওয়ার্ডঃ</label>
                    <input name="password" type="password" autocomplete="off">
                    <label>পুনরায় পাসওয়ার্ডটি দিনঃ</label>
                    <input name="password2" type="password" autocomplete="off">
                    <button class="quizbutton" name="registration" type="submit">সাবমিট করুন</button>
                </form>
            </div>
        </div>

    </div>
    <?php
unset($_SESSION["error_reg1"]);
?>
</body>

</html>