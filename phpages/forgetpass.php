<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: forgetpass');
 exit;
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
        <div id="containbody" style="margin-top: 100px;border-radius: 10px;">
            <div id="quizbody">
                <p>পাসওয়ার্ড সম্পর্কিত বিষয়ে আমাদের হেল্প লাইনে যোগাযোগ করুনঃ</p>
                <p>০১৯৩১৯৫৭১৬১</p>
            </div>
        </div>

</body>

</html>
