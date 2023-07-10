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
  document.getElementById("my-Btn").disabled = true;
}

function pro() {
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

  // for (var i = 0; i < pSize; i++) {
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