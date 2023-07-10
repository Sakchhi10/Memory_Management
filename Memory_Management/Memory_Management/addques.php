<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db="quiz";
   $tb="questions";
  if(isset($_POST['ques'])){
    $con=new mysqli($servername,$username,$password,$db);
      $ques=$_POST['ques'];
      $op1=$_POST['op1'];
      $op2=$_POST['op2'];
      $op3=$_POST['op3'];
      $op4=$_POST['op4'];
      $op=$_POST['op'];
      $exp=$_POST['exp'];
      $sql="INSERT INTO $tb (`question`,`opt1`,`opt2`,`opt3`,`opt4`,`option`,`explanation`) VALUES ('$ques','$op1','$op2','$op3','$op4','$op','$exp')";
      $con->query($sql);
      $con->close();
     }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
</head>
<body>
    <form action="addques.php" method="POST">
        <input type="textbox" height="100px" width="100px" name="ques" placeholder="Question"><br /><br />
        <input type="textbox" height="100px" width="100px" name="op1" placeholder="Option a"><br /><br />
        <input type="textbox" height="100px" width="100px" name="op2" placeholder="option b"><br /><br />
        <input type="textbox" height="100px" width="100px" name="op3" placeholder="Option c"><br /><br />
        <input type="textbox" height="100px" width="100px" name="op4" placeholder="Option d"><br /><br />
        <input type="textbox" height="100px" width="100px" name="op" placeholder="Correct Option a/b/c/d"><br /><br />
        <input type="textbox" height="100px" width="100px" name="exp" placeholder="explanantion"><br /><br />
        <input type="submit" value="submit">
    </form>
</body>
</html>