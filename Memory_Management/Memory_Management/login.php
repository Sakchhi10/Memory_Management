<?php
    $server="localhost";
    $user="root";
    $pss="";
    $db="quiz";
    $tb="participant";
    $con=new mysqli($server,$user,$pss,$db);
    if(isset($_POST['naam']) && isset($_POST['srn'])){
        $_srn="/^[A-Z]{3}[0-9][A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}$/";
        $srn=$_POST['srn'];
        $name=$_POST['naam'];
        if(!preg_match($_srn,$srn))
            echo "<script>alert('INVALID SRN');</script>";
        else{
        $sql="INSERT INTO `$tb` (`SRN`,`NAME`) VALUES ('$srn','$name')";
        if($con->query($sql)){
            session_start();
            $_SESSION['user']=$name;
            $_SESSION['srn']=$srn;
            echo "<script>document.location.href='quiz.php';</script>";
        }
        else{
            echo "<script>alert('SRN ALREADY REGISTERED')</script>";
        }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

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



        }

        #heading {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 20px;
            color: white;
            text-align: center;
            background-color: #001545;
            border: 1px solid black;
            padding: .5rem;
            width: 20rem;
            height: 3rem;
            border-radius: .5rem;
            margin: auto;
            margin-bottom: none;


        }

        .Subcanvas {
            border: 1px solid black;
            padding: 2rem;
            margin-top: none;
            width: 17rem;
            margin: auto;
            border-radius: .5rem;
            background-color: bisque;

        }

        .Subcanvas p {
            font-size: 1.5rem;
            font-family: "Montserrat", sans-serif;

        }

        input[type="text"] {
            border-radius: .5rem;
            width: 15rem;
            height: 2rem;
            margin-bottom: 1.2rem;
            align-items: center;
        }

        .container{
            align-items: center;
            margin-top: 7rem;

        }

        #button{
            align-items: center;
            width: 5rem;
            height: 2rem;
            border-radius: .5rem;
            font-size: large;    
            font-weight:bold;
            background-color: #001545;
            color: white;
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
    <div class="container">

        <div class="canvas">
            <h2 id="heading">Enter your details To continue</h2>
            <form method="POST" action="login.php">
            <div class="Subcanvas">
                <p>Enter Name: </p>
                <input type="text" name="naam" >

                <p>Enter SRN: </p>
                <input type="text" name="srn">

                <input type="submit" value="PLAY" id="button"></form>
            </div>
        </div>
    </div>

    <?php
    $con->close();
     ?>
</body>

</html>