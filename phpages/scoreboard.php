<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: scoreboard');
 exit;
}
?>

<?php
require 'php/db.php';

$sqltm    = "SELECT * FROM reg t1 INNER JOIN rank t2 ON t1.userid = t2.userid";
$resulttm = mysqli_query($db, $sqltm);
$counttm  = mysqli_num_rows($resulttm);
while ($rowtm = mysqli_fetch_array($resulttm, MYSQLI_ASSOC)) {
 if ($rowtm['userid'] == $rowtm['userid']) {
  $uid        = $rowtm['userid'];
  $marks1     = $rowtm["marks1"];
  $marks2     = $rowtm["marks2"];
  $marks3     = $rowtm["marks3"];
  $totalmarks = ($marks1 + $marks2 + $marks3);
  $tmqury     = "UPDATE rank SET totalmarks = '$totalmarks' WHERE userid = $uid";
  mysqli_query($db, $tmqury);
 }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz for Intellectuals - BURADiO</title>
    <link rel="shortcut icon" href="media/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media screen and (max-width: 425px) {
            table {
                font-size: 14px;
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
                    <a class="quizbutton" href="home">হোম পেইজ</a>
                </div>
            </div>
        </div>

        <div id="containbody">
            <div id="scorebody">
                <h2><strong><u>স্কোরবোর্ড</u></strong></h2>
                <table class="responstable">
                    <tbody>
                        <tr>
                            <th>নাম</th>
                            <th>রোল</th>
                            <th>স্কোর</th>
                        </tr>

                        <?php
$sqlr    = "SELECT * FROM reg t1 INNER JOIN rank t2 ON t1.userid = t2.userid ORDER BY t2.totalmarks DESC";
$resultr = mysqli_query($db, $sqlr);
$countr  = mysqli_num_rows($resultr);
while ($rowr = mysqli_fetch_array($resultr, MYSQLI_ASSOC)) {
 ?>
                        <tr>
                            <td><?php echo $rowr['name']; ?></td>
                            <td><?php echo $rowr['roll']; ?></td>
                            <td><?php echo $rowr['totalmarks']; ?></td>
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