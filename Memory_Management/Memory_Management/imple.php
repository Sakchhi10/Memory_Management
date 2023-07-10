<!DOCTYPE html>
<html lang="en" id="implementation">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var arr = [];
var pSize;
for (var i = 0; i < 4; i++) {
  document.getElementsByClassName('process')[i].disabled = true;
}

function memory() {
  for (var i = 0; i < 5; i++) {
    var input = document.createElement("div");
    input.setAttribute("type", "text");
    input.setAttribute("class", "box input-read");
    input.innerHTML = arr[i] = random();
    input.style =
      "width:400px; height:70px; border:2px solid black; text-align:center;margin:auto;";
    var sec = document.getElementById("sec");
    var sp = sec.appendChild(input);
  }
  document.getElementById("my-Btn").disabled=true;
}
function pro() {
  console.log("ASDasd");
  pSize = prompt("Enter the size of process!");
  if(pSize>4){
    alert("invalid input! Enter less less uptp 4");
  }
  for (var i = 0; i < pSize; i++) {
    document.getElementsByClassName('process')[i].disabled = false;
  }
}

function myFun() {
  if (
    document.getElementsByName("radio")[0].checked == false &&
    document.getElementsByName("radio")[1].checked == false &&
    document.getElementsByName("radio")[2].checked == false
  ) {
    alert("Choose any Algorithm!!");
  } else {
    if (document.getElementsByName("radio")[0].checked == true) {
      firstFit();
    }
    if (document.getElementsByName("radio")[1].checked == true) {
      bestFit();
    }
    if (document.getElementsByName("radio")[2].checked == true) {
      worstFit();
    }
  }
}

function random() {
  let x = Math.floor(Math.random() * 1000 + 1);
  return x;
}

function cls() {
  location.reload();
}

function firstFit() {
  var btnVal = document.getElementById('id');
  btnVal.innerHTML = "First Fit";
  // document.getElementById()
  flag = [0, 0, 0, 0, 0];
  process = [];
  for (var i = 0; i < pSize; i++) {
    process[i] = document.getElementsByClassName("process")[i].value;
  }
  // for (var i = 0; i < 4; i++) {
  //   if (document.getElementsByClassName("process")[i].value == "") {
  //     alert("Plz fill all the process size");
  //     return false;
  //   }
  // }
  for (var i = 0; i < pSize; i++) {
    var z = document.getElementsByClassName("process")[i].value;
    if (!z.match(/^\d+/)) {
      alert("Enter only digits");
    }
  }

  for (var i = 0; i < 5; i++) {
    for (var j = 0; j < 5; j++) {
      if (arr[i] >= process[j] && flag[j] == 0) {
        document.getElementsByClassName('box')[i].style.backgroundColor="grey";
        document.getElementsByClassName("input-read")[
          i
        ].innerHTML = `Memory-->${arr[i]} <br> Process Size--> ${parseInt(
          process[j]
        )} <br> Waste Memory-->${parseInt(arr[i]) - parseInt(process[j])}`;
        console.log(
          `Memory-->${arr[i]} <br> Process Size--> ${parseInt(
            process[j]
          )} <br> Waste Memory-->${parseInt(arr[i]) - parseInt(process[j])}`
        );
        flag[j] = 1;
        break;
      }
    }
  }
}

const worstFit = () => {
  var btnVal = document.getElementById('id');
  btnVal.innerHTML = "Worst Fit";
  var flag = true;
  process1 = [];
  index = [];
  var c = 0;
  for (var i = 0; i < pSize; i++) {
    process1[i] = document.getElementsByClassName("process")[i].value;
  }

  for (var i = 0; i < 5; i++) {
    if (!flag) {
      location.reload()
      break
    }
    for (var j = 0; j < pSize; j++) {
      if (arr[i] < process1[j]) {
        alert("process cannot be allocated as required memory is more than available block size")
        flag = false;
        console.log(flag)
        break
      }
    }
  }
  for (var i = 0; i < pSize; i++) {
    var z = document.getElementsByClassName("process")[i].value;
    if (!z.match(/^\d+/)) {
      alert("Enter only digits");
      return false;
    }
  }

  var max;
  console.log("This is the array", arr);
  max = arr[0];
  for (let i = 1; i < arr.length; i++) {
    if (arr[i] > max) {
      max = arr[i];
      index[0] = i;
    }
  }
  console.log(index[0]);

  var secondLargest = Number.MIN_VALUE;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] > secondLargest && arr[i] < max) {
      secondLargest = arr[i];
      index[1] = i;
    }
  }

  var thirdLargest = Number.MIN_VALUE;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] > thirdLargest && arr[i] < secondLargest) {
      thirdLargest = arr[i];
      index[2] = i;
    }
  }

  var fourthLargest = Number.MIN_VALUE;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] > fourthLargest && arr[i] < thirdLargest) {
      fourthLargest = arr[i];
      index[3] = i;
    }
  }

  // var fifthLargest = Number.MIN_VALUE;
  // for (var i = 0; i < arr.length; i++) {
  //     if (arr[i] > fifthLargest && arr[i] < fourthLargest) {
  //         fifthLargest = arr[i];
  //         index[4] = i;
  //     }
  // }
  // document.getElementsByClassName('input-read')[index].innerHTML = `Memory-->${arr[index]} <br> Process Size-->  ${parseInt(process[c])} <br> Waste Memory--> ${parseInt(arr[index])-parseInt(process[c])}`;

  //here i have add log, see  console its comparision
  if (flag) {
    for (var i = 0; i < pSize; i++) {
      // if(process[0]<arr[index[0]])
      // {
      //      document.getElementsByClassName('input-read')[index[i]].innerHTML = `Memory-->${arr[index[i]]} <br> Process Size-->  ${parseInt(process[i])} <br> Waste Memory--> ${parseInt(arr[index[i]])-parseInt(process[i])}`;
      // }
      for (var j = 0; j < pSize; j++) {

        console.log(
          "process" + j + ": " + process1[j] + "\narr:" + arr[index[i]]
        );
        if (process1[j] < arr[index[i]]) {
          console.log(
            "----------\nTrue\nprocess" +
            j +
            ": " +
            process1[j] +
            "\narr:" +
            arr[index[i]]
          );
          var res = parseInt(arr[index[i]]) - parseInt(process1[i]);
          // if (process1[i] != NaN) {
            document.getElementsByClassName('box')[index[i]].style.backgroundColor="grey";
            document.getElementsByClassName("input-read")[
              index[i]
            ].innerHTML = `Memory-->${
            arr[index[i]]
          } <br> Process Size-->  ${parseInt(process1[i])} <br> Waste Memory--> ${
            parseInt(arr[index[i]]) - parseInt(process1[i])
          }`;
            break;
          // }
        }
      }

    }
  }

  // console.log(index, process1)
  // for (var i = 0; i < index.length; i++) {
  //     // if(process[0]<arr[index[0]])
  //     // {
  //     //      document.getElementsByClassName('input-read')[index[i]].innerHTML = `Memory-->${arr[index[i]]} <br> Process Size-->  ${parseInt(process[i])} <br> Waste Memory--> ${parseInt(arr[index[i]])-parseInt(process[i])}`;

  //     // }
  //     for (var j = 0; j < index.length; j++) {
  //         if (process1[j] < arr[index[i]]) {
  //             document.getElementsByClassName('input-read')[index[i]].innerHTML = `Memory-->${arr[index[i]]} <br> Process Size-->  ${parseInt(process1[i])} <br> Waste Memory--> ${parseInt(arr[index[i]])-parseInt(process1[i])}`;
  //             break;
  //         }

  //     }
  // }
};
//  }
function bestFit() {
  var btnVal = document.getElementById('id');
  btnVal.innerHTML = "Best Fit";
  var count;
  flag = [0, 0, 0, 0, 0];
  process = [];
  for (var i = 0; i < pSize; i++) {
    process[i] = document.getElementsByClassName("process")[i].value;
  }
  // for (var i = 0; i < 4; i++) {
  //   if (document.getElementsByClassName("process")[i].value == "") {
  //     alert("Plz fill all the process size");
  //     return false;
  //   }
  // }
  for (var i = 0; i < pSize; i++) {
    var z = document.getElementsByClassName("process")[i].value;
    if (!z.match(/^\d+/)) {
      alert("Enter only digits");
      return false;
    }
  }
  // if (
  //   process[0] == "" ||
  //   process[1] == "" ||
  //   process[2] == "" ||
  //   process[3] == ""
  // ) {
  //   alert("Please enter all the process size!!");
  // } else {
  var newDifference;
  var difference;
  for (var i = 0; i < pSize; i++) {
    difference = 9999999;
    for (var j = 0; j < pSize; j++) {
      newDifference = arr[j] - process[i];
      if ((newDifference > -1) && (newDifference <= difference) && flag[j] == 0) {
        difference = newDifference;
        count = j;
      }
    }
    console.log(count);
    document.getElementsByClassName('box')[i].style.backgroundColor="grey";
    document.getElementsByClassName("input-read")[count].innerHTML = `Memory-->${arr[count]} <br> Process Size-->  ${parseInt(process[i])} <br> Waste Memory--> ${parseInt(arr[count])-parseInt(process[i])}`;
    flag[count] = 1;
  }
  // }

}
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');

        * {
            margin: 0 0;
            padding: 0 0;
        }

        body {
            background-color: #f2bc94;
        }

        header li {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        header h2 {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 25px;
            color: white;
            text-decoration: none;
            margin-left: 100px;
        }

        header {
            background-color: #001545;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 32px 10px;
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
            color: rgb(238, 241, 34);
        }

        .canvas {
            height: 500px;
            width: auto;
            background-color: #a1c3d3;
            border: 1px, 1px, solid black;
            margin-left: 3rem;
            margin-right: 3rem;
            margin-top: none;
            margin-bottom: none;
            padding: 3rem;
            padding-top: none;
            border:2px solid rgb(12, 104, 151);

        }

        /* input{
            display: inline;
        } */

        table.ex1 {
            border: 1px solid black;
            empty-cells: show;
        }

        table {
            margin-top: 5rem;
            margin-left: 3rem;
        }

        td {
            width: 500px;
            height: 60px;

        }

        .bottom {
            margin-left:3rem;
            margin-right:3rem;
            margin-top:none;
            background-color: #bfe2c7;
            padding: 4rem;
            border:2px solid seagreen

        }

        h3 {
            font-family: sans-serif;
        }

        .chkbox {
            margin: 15px 0;
            display: inline-block;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
        }

        .in-one-line {
            display: inline-flex;
        }

        .in-one-line h3 {
            margin-top: 0;
            padding-top: 0;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;

        }

        .options {
            display: flex;
        }

        .options h3 {
            margin-right: 30px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
           


        }

        .bottom h3 {
            padding: 10px;
        }

        .submit-button {
            margin-left: 30%;
            padding: 15px;
        }

        button {
            cursor: pointer;
        }

        .input-read {
            color: rgb(43, 10, 230);
        }

        .sec-Btn {
            color: #a1c3d3;
            border: 2px solid rgb(12, 104, 151);
            width: 180px;
            height: 50px;
            font-size: larger;
            color: #1998d3;
            margin-top: 20px;
        }

        .optbutton{
            font-size: large;
            padding:.3rem;
            width:8rem;
            margin-right:.5rem;
            border: 2px solid seagreen;
            color:seagreen;
            border-radius:10px;


        }


        #id {
            /* display: inline-block; */
            margin-top: 20px;
            border: 2px solid rgb(12, 104, 151);
            cursor: none;
            width: 180px;
            height: 50px;
            color: #a1c3d3;
            font-size: larger;
            color: #1998d3;
            background-color: azure;
            text-align: center;
            /* display: flex; */
            /* justify-content: center; */
        }
        #sp{
            margin-bottom: 20px;
        }

        .process{
            border-radius: 10px;
            height:2rem;
            width:13rem;
            border:2px solid seagreen;
        }

      
    </style>
</head>
<header>

    <body style="background-color: #f4af1b;">
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
<h2 id="heading" style="margin: 2rem 3rem 0 3rem ">Implementation of memory allocation</h2>
<section id="sec" class="canvas" style="height:700px;width: auto;">
    <div><button type="button" class="sec-Btn" id="my-Btn btn" onclick="memory()">Memory</button></div>
    <div id="sp"><button type="button" class="sec-Btn" id="my-Btn btn" onclick="pro()">Process</button></div>
    <div id="id"></div>
</section>
<section class="bottom">
    <form>
        <!-- <h3>Enter the size of the memory<input type="integer" id="size" style="margin-left: 10px;"></h3> -->
        <!-- <button type="button" onclick="memory()">Memory</button> -->
        <div class="options">
            <div style="float:left; margin-right: 0px;">
                <h3>Enter process size for P1<input class="process" min="0" id="P1" type="text"
                        style="margin-left: 42px;">
                </h3>
                <h3>Enter process size for P2<input class="process" id="P2" type="text" style="margin-left: 42px;">
                </h3>
            </div>
            <div style="float: right; margin-left: 30px;">
                <h3>Enter process size for P3<input type="text" class="process" style="margin-left: 42px;"></h3>
                <h3>Enter process size for P4<input type="text" class="process" style="margin-left: 42px;"></h3>
            </div>
        </div>
        <div style="display:block">
            <h3 class="chkbox">Choose the algorithm: </h3>
            <div class="in-one-line">
                <input class="chkbox" name="radio" type="radio" />
                <h3 >First Fit</h3>
                <input class="chkbox" name="radio" type="radio" />
                <h3 >Best Fit</h3>
                <input class="chkbox" name="radio" type="radio" />
                <h3>Worst Fit</h3>
            </div>
            <!-- <div class="submit-button"> -->
            <!-- <h3><input type="submit" value="Submit"></h3> -->
            <!-- <button type="button" id="my-Btn" onclick="memory()">Memory</button> -->
            <!-- <button type="button" onclick="pro()">Process</button> -->
            <button type="button" class = "optbutton" onclick="myFun()">Submit</button>
            <button type="button" class = "optbutton" onclick="cls()">Clear</button>
            <!-- </div> -->
        </div>
    </form>
</section>

</body>

</html>