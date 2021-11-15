<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: dashboard');
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

if (empty($_SESSION['regmobile']) && empty($_SESSION['regpass'])) {
 $_SESSION["error_login"] = "প্রথমে লগইন করুন!";
 echo "<script type='text/javascript'> document.location = 'login'; </script>";
 exit;
}

require 'php/db.php';

$mobile   = mysqli_real_escape_string($db, $_SESSION['regmobile']);
$password = mysqli_real_escape_string($db, $_SESSION['regpass']);

$sqlck    = "SELECT * FROM reg WHERE mobile = '$mobile' AND pass = '$password'";
$resultck = mysqli_query($db, $sqlck);
$rowck    = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
if ("dis" == $rowck['step1']) {
 echo "<script type='text/javascript'> document.location = 'dismis'; </script>";
 exit;
}

$sql    = "SELECT * FROM reg WHERE mobile = '$mobile' AND pass = '$password'";
$result = mysqli_query($db, $sql);
$count  = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

 //access code
 $useridac = $row['userid'];
 unset($_SESSION["secondpage"]);
 $_SESSION["firstpage"] = "$useridac";

 if ("pass" == $row["step1"]) {
  $_SESSION['step1']    = "pass";
  $_SESSION["step1ini"] = "display: none";
 } elseif ("fail" == $row["step1"]) {
  $_SESSION['step11']   = "fail";
  $_SESSION["step1ini"] = "display: none";
 } else {
  echo $tx = "";
  unset($_SESSION["step1ini"]);
  unset($_SESSION["step1"]);
  unset($_SESSION["step11"]);
 }

 if (empty($_SESSION['step1'])) {
  $_SESSION["step1"] = "display: none";
 }

 if ("fail" == $row["step1"]) {
  $_SESSION['step11']   = "fail";
  $_SESSION["step1"]    = "display: none";
  $_SESSION["step1ini"] = "display: none";
 } else {
  echo $tx = "";
  unset($_SESSION["step11"]);
 }

 if (empty($_SESSION['step11'])) {
  $_SESSION["step11"] = "display: none";
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
        body {
            margin: 0;
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
                    <a class="outbutton" href="logout">লগআউট করুন</a>
                </div>
            </div>
        </div>
        <div id="userdtls">
            <p style="font-size: 16px;"><strong><?php echo $row['name']; ?></strong></p>
            <p style="font-size: 14px;"><?php echo $row['mobile']; ?></p>
            <p style="font-size: 14px;"><?php echo $row['email']; ?></p>
        </div>
        <div id="navitem">
            <ul>
                <li><a class="liactive" href="#">কুইজ</a></li>
            </ul>
        </div>
        <div id="containbody">
            <div id="quizbody">
                <p style="<?php echo $_SESSION['step11']; ?>">আপনি কুইজ পরিক্ষায় <strong><a
                            style="color: red;">অনুত্তীর্ণ!</a></strong></p>


                <?php
$sqlm    = "SELECT * FROM reg WHERE mobile = '$mobile' AND pass = '$password'";
 $resultm = mysqli_query($db, $sqlm);
 $countm  = mysqli_num_rows($resultm);
 $rowm    = mysqli_fetch_array($resultm, MYSQLI_ASSOC);
 ?>

                <div id="rankbody" style="<?php echo $_SESSION['step1']; ?>">
                    <p>আপনার স্কোরঃ <br /><br /><a style="font-size: 44px;"><?php echo $rowm["marks1"]; ?></a></p>



                    <div id="frgtpass" style="margin-top: 50px; text-decoration: underline;">
                        <a style="font-size: 16px; font-weight: 600;" href="scoreboard"><em>স্কোরবোর্ড দেখুন</em></a>
                    </div>
                </div>




                <p style="<?php echo $_SESSION['step1ini']; ?>">কুইজ পর্বে অংশগ্রহন করতে নিচের বাটনে ক্লিক করুন।</p>
                <br /><br />
                <a style="<?php echo $_SESSION['step1ini']; ?>" class="quizbutton" href="quiz">কুইজে প্রবেশ করুন!</a>
                <p style="<?php echo $_SESSION['step1ini']; ?>; color:red;">(কুইজের সতর্কতা গুলো ভালো ভাবে পড়ে দেখবেন)
                </p>
            </div>
        </div>

    </div>
    <?php
}
?>
</body>

</html>