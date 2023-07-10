<?php
    session_start();
    $server="localhost";
    $user="root";
    $pss="";
    $db="quiz";
    $con=new mysqli($server,$user,$pss,$db);
    $arr=array();
    $sql="SELECT * FROM `questions`";
    $row=$con->query($sql);
    $i=0;
    $val=0;
    $arr=array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLUTIONS</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');

        * {
            padding: 0 0;
            margin: 0 0;
        }

        body {
            background-color: #f4af1b;
        }

        header h2 {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 25px;
            color: white;
            text-decoration: none;
        }

        header {
            background-color: #001545;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 32px 10px;

        }

        header li {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        .nav__links {
            list-style: none;
        }

        .nav__links li {
            display: inline;
            padding: 0px, 20px;
        }

        .nav__links li a {
            list-style: none;
            text-decoration: none;
            color: white;
            margin-right: 40px;
            transition: all 0.3s ease 0s;

        }

        .nav__links li a:hover {
            color: rgb(238, 241, 34)
        }

        .canvas {
            margin: 30px 2rem;
            width: 70%;
            flex:70%;
            background-color: #f2bc94;
            float:left;
        }

        .row {
            flex: 60% 40%;
        }

        #heading {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 20px;
            color: white;

            width: auto;
            text-align: center;
            background-color: #001545;
            border: 1px solid black;
            padding: 1rem;


        }

        .main{
            display:flex;
        }

        .row{
            flex:30%;
        }
        header h2 {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 25px;
            color: white;
            text-decoration: none;
            margin-left: 30px;
        }

        .question_heading {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 17px;
            color: white;
            background-color: #001545;
            border: 1px solid black;
            padding: .5rem;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        input[type="radio"] {
            margin-left: 2rem;
        }

        label {
            font-size: 18px;
            line-height: 24px;
            font-family: "Raleway", sans-serif;
            font-weight: 350;
            padding: .5rem;

        }

        .banr-btn {
            text-align: center;

        }

        .button {
            font-size: 1.5rem;
            border-radius: 5%;
            padding: .5rem;
            font-family: sans-serif;
            text-align: center;
            margin-left: 45%;
            background-color: #001545;
            margin-bottom: 3%;
            color: white;

        }

        .subcanvas {
            margin-bottom: 1rem;
            width: auto;
        }

        .answerinfo {
            background-color: white;

        }
        #a{
            text-align:center;
            /* padding-top:5px; */
            padding-bottom:1rem;
        }
        table {
            margin: 2rem;
            padding:2px;
            border: 2px solid orange;
            width: 25rem;
            border-radius:10px;
        }
        td {
            padding-top:30px;
            background-color: #f2bc94;
            border-radius:.3rem;
        }
        table tr{
            border:2px solid blue;
        }
        .first{
            font-family: "Montserrat", sans-serif;
            position:relative;
            font-size:200%;
            float:left;
          
            
        }
        .seca{
            font-family: "Montserrat", sans-serif;
            font-size:200%;
            float:center;
            margin-top:30px;
            float:center;
            
        }
        .secb{
            font-family: "Montserrat", sans-serif;
            font-size:200%; 
            float:right;
           
        }
        .score{
            border: 1px solid black;
            background-color:  #001545 ;
            padding:1rem;
            margin:1.5rem;
            color:white;
            font-family: "Montserrat", sans-serif;
            border-radius:.3rem;
        }

        .reviewheading{
            font-size:1rem;
            margin-left: 1rem;

        }
    </style>
</head>

<body>
    <header>
        <div class="logo"><a href="#"><img src="logo2.png"></a>

        </div>

        <h2>Memory Management</h2>
        <nav>
            <ul class="nav__links">

                <li><a href="homepage.html">Home</a></li>
                <li><a href="index_new.html">Description</a></li>
                <li><a href="types.html">Algorithms</a></li>
                <li><a href="imple.php">Implementation</a></li>
                <li><a href="login.php">Quiz</a></li>
                <li><a href="aboutus.html">About us</a></li>



            </ul>

        </nav>
    </header>
    <br>
    <div class="main">
        <div class="canvas">
                <h2 id="heading">SOLUTIONS</h2>
                <br/>
                <div class="subcanvas">
                    <?php 
                while($result=$row->fetch_assoc()){
                    if(isset($_POST[$result['id']]))
                        array_push($arr,$_POST[$result['id']]);
                    else
                        array_push($arr,'e');
                ?>
                    <h3 class="question_heading">
                        <?php echo $result['question']; ?>
                    </h3>
                        <?php if($arr[$i]=='a') {?>
                            <input type="radio" id="op1" value="a" checked>
                            <?php } else {?>
                            <input type="radio" id="op1" value="a">
                            <?php } ?>
                            <label for="vehicle1">
                                <?php echo $result['opt1']; ?>
                            </label><br>
                        <?php if($arr[$i]=='b') {?>
                            <input type="radio" id="op2" value="b" checked>
                            <?php } else {?>
                            <input type="radio" id="op2" value="b">
                            <?php } ?>
                            <label for="vehicle2">
                                <?php echo $result['opt2']; ?>
                            </label><br>
                        <?php if($arr[$i]=='c') {?>
                            <input type="radio" id="op3" value="c" checked>
                            <?php } else {?>
                            <input type="radio" id="op3" value="c">
                            <?php } ?>
                            <label for="vehicle3">
                            <?php echo $result['opt3']; ?>
                            </label><br>
                        <?php if($arr[$i]=='d') {?>
                            <input type="radio" id="op4" value="d" checked>
                            <?php } else {?>
                            <input type="radio" id="op4" value="d" >
                            <?php } ?>
                            <label for="vehicle3">
                            <?php echo $result['opt4']; ?>
                            </label><br><br>
                            <label>
                            <?php 
                     if($arr[$i]==$result['option']){
                         $val++;
                         echo  "<h3 class = 'reviewheading'>&nbsp CORRECT<br/></h3>";
                     }
                     else
                        echo "<h3 class = 'reviewheading'>&nbsp INCORRECT<br/></h3>";
                     $i++;
                    echo  "<h3 class = 'reviewheading'>&nbsp Correct Answer: ",$result['option'],"<br> &nbspExplanation : ",$result['explanation'],"</h3>";
                    }?>
                        </label>
                    </div>
                    <!-- <input type="submit" value="submit" class="button"></input> -->

                    <?php $score=($val*100)/$i; $pscore=sprintf("%.2f",$score);
            unset($sql);
            $srn=$_SESSION['srn'];
            $sql="UPDATE `participant` SET `SCORE`='$pscore' WHERE `SRN`='$srn'";
            if(!$con->query($sql))
                    echo $con->error;
            ?>
        </div>
        <div class="row">
            <?php
             echo "<h2 class='score'> YOUR SCORE : ",$pscore,"%</h2>";
           $board1="SELECT `NAME`,`SCORE` FROM `participant`";
           $board=$con->query($board1);
           $trs=array();
           while($res=$board->fetch_assoc()){
               $trs[$res['NAME']]=$res['SCORE'];
             }
           $names=array();
           arsort($trs);
           echo "<table>";
           foreach($trs as $k=>$v){
               if(count($names)<4)
                array_push($names,$k);
               echo "<tr><td><h2 id='a'>$k","  -   ","$v%</h2></td></tr>";
           }
           echo "</table><br/><br/>";
        //    echo "<div class='first'>$names[0]</div><div class='seca'>$names[1]</div>
        //    <div class='secb'>$names[2]</div>";
           ?>
        </div>
        </div>
</body>
</html>

<?php
 $con->close();
?>