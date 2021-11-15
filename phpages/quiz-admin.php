<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: admin131');
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

require 'php/db.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Quiz for Intellectuals - BURADiO</title>
    <link rel="shortcut icon" href="media/logo2.png">
    <link rel="stylesheet" href="css/style.css">

    <style>
        button {
            margin: 0 auto;
            max-width: 120px;
            width: 100%;
            position: relative;
        }

        input {
            width: 30px;
        }

        #containbody {
            margin: 0 auto;
            max-width: 1000px;
            font-family: Arial, Helvetica, sans-serif;
            min-height: 80px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            overflow: auto;
            text-align: center;
        }

        .abutton {
            padding: 0;
            border: 0;
            width: 40px;
            height: 20px;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        table {
            font-size: 14px;
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
                    <a href="index.php"><img class="logo" src="media/logo.png"></a>
                </div>
                <div class="right">
                    <a class="quizbutton" href="home">হোম পেইজ</a>
                </div>
            </div>
        </div>

        <div id="containbody">

            <div id="scorebody">
                <h2 style="font-family: bangla;"><strong><u>অ্যাডমিন প্যানেল - Quiz for Intellectuals</u></strong></h2>
                <table class="responstable">
                    <tbody>
                        <tr>
                            <th style="width: 20px;">ক্রমিক</th>
                            <th>নাম</th>
                            <th>মোবাইল</th>
                            <th>ইমেইল</th>
                            <th style="width: 50px;">পয়েন্টস</th>
                            <th style="width: 140px;">শুরু</th>
                            <th style="width: 140px;">শেষ</th>
                        </tr>

                        <?php
$sqlr    = "SELECT * FROM reg WHERE step1='pass' ORDER BY marks1 DESC";
$resultr = mysqli_query($db, $sqlr);
$countr  = mysqli_num_rows($resultr);
while ($rowr = mysqli_fetch_array($resultr, MYSQLI_ASSOC)) {

 ?>
                        <tr>
                            <td><?php echo @$snr += 1; ?></td>
                            <td><?php echo $rowr['name']; ?></td>
                            <td><?php echo $rowr['mobile']; ?></td>
                            <td><?php echo $rowr['email']; ?></td>
                            <td><?php echo $rowr['marks1']; ?></td>
                            <td><?php echo $rowr['questart']; ?></td>
                            <td><?php echo $rowr['quend']; ?></td>
                        </tr>
                        <?php
}
?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</body>

</html>