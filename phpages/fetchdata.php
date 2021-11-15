<?php
session_start();
?>

<?php
include '../php/db.php';

if (isset($_SESSION['checkpgck'])) {

 $mobile   = mysqli_real_escape_string($db, $_SESSION['regmobile']);
 $password = mysqli_real_escape_string($db, $_SESSION['regpass']);

 $query     = "SELECT * FROM quiz";
 $query_run = mysqli_query($db, $query);

 if ($query_run) {
  while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {

   $sqlds    = "UPDATE reg SET step1 ='dis' WHERE mobile = '$mobile' AND pass = '$password'";
   $resultds = mysqli_query($db, $sqlds);

   date_default_timezone_set('Asia/Dhaka');
   $timestamp  = date('(dM) G:i:s A');
   $sqlqsrt    = "UPDATE reg SET questart = '$timestamp' WHERE mobile = '$mobile' AND pass = '$password'";
   $resultqsrt = mysqli_query($db, $sqlqsrt);

   echo "<h4>$row[sl]. $row[que]</h4>";
   echo "<ul>";
   echo "<li><input type=radio value=1 name=$row[userans]>$row[option1]</li>";
   echo "<li><input type=radio value=2 name=$row[userans]>$row[option2]</li>";
   echo "<li><input type=radio value=3 name=$row[userans]>$row[option3]</li>";
   echo "<li><input type=radio value=4 name=$row[userans]>$row[option4]</li>";
   echo "</ul>";
  }
 } else {
  echo "Error!";
 }

} else {
 echo "congratulations! you made it! it's little bit tricky but you made it! can i have a chat with you? you know me, right? (i hope). <br/> - thank you.";
}

unset($_SESSION["checkpgck"]);
