<?php
 session_start();
 $heading=strtoupper($_SESSION['user']);
 $server="localhost";
 $user="root";
 $pss="";
 $db="quiz";
 $con=new mysqli($server,$user,$pss,$db);
 $sql="SELECT `id`,`question`,`opt1`,`opt2`,`opt3`,`opt4` FROM `questions`";
 $row=$con->query($sql);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Your Knowledge</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
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
            color:  rgb(238, 241, 34)
        }

        .canvas {

            margin: 30px 2rem;
            background-color: #f2bc94;
        }

        #heading {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 20px;
            color: white;
            text-align: center;
            background-color: #001545;
            border: 1px solid black;
            padding: 1rem;
        }


        header h2 {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 25px;
            color: white;
            text-decoration: none;
            margin-left: 30px;
        }

        .question_heading{
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 17px;
            color: white;
            background-color: #001545;
            border: 1px solid black;
            padding: .5rem;
            margin-left: 1rem;
        }
        
        input[type="radio"]{
            margin-left: 2rem;
        }

        label{
            font-size: 18px;
            line-height: 24px;
            font-family: "Raleway",sans-serif;
            font-weight: 350;
            padding: .5rem;

        }
        .banr-btn{
            text-align: center;
        }
        .log{
            display:flex;
            justify-content:space-evenly;
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 17px;
            color: white;
            background-color: #001545;
          
        }
        /* .log h1{
            flex:20%;
        } */
        .button{
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

        .subcanvas{
                margin-bottom : 1rem;
        
        }
        .quizinfo{
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 17px;
            color: white;
            background-color: #001545;
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
                <li><a href="login.html">Quiz</a></li>
                <li><a href="aboutus.html">About us</a></li>
                
                

            </ul>

        </nav>
    </header>
    <br/>
    <div class="log">
    <h1 ><?php echo $_SESSION['srn'];?></h1>
    <h1><?php echo $heading;?></h1>
    </div>
    <br/>
    <div class="canvas">
        <h2 id="heading">Test Your Knowledge</h2>

        <br>  <br>
        <form action="podium.php" method="POST">
        <?php 
            while($result=$row->fetch_assoc()){
                ?>
        <h3 class = "question_heading" > <?php echo $result['question']; ?> </h3>
        <div class="subcanvas">
           
                <input type="radio" id="op1" name="<?php echo $result['id'];?>" value="a">
                <label for="vehicle1"> <?php echo $result['opt1']; ?></label><br>
                <input type="radio" id="op2" name="<?php echo $result['id'];?>" value="b">
                <label for="vehicle2"> <?php echo $result['opt2']; ?></label><br>
                <input type="radio" id="op3" name="<?php echo $result['id'];?>" value="c">
                <label for="vehicle3"> <?php echo $result['opt3']; ?></label><br>
                <input type="radio" id="op4" name="<?php echo $result['id'];?>" value="d">
                <label for="vehicle3"><?php echo $result['opt4']; ?></label><br><br>
        </div>
        <?php } 
        $con->close();
        ?>
         <input type="submit" value="submit" class="button"></input>
       </form>
    </div>
</body>

</html>