function stanValue(str) {
  if (str == "") {
    document.getElementById("div").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("div").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","divinfo.php?s="+str,true);
    xmlhttp.send();
  }
}

function stanValue1(str) {
  if (str == "") {
    document.getElementById("Attentable").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Attentable").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","filterinfo1.php?s="+str,true);
    xmlhttp.send();
  }
}

function divValue(str) {
  if (str == "") {
    document.getElementById("Attentable").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Attentable").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","filterinfo1.php?d="+str,true);
    xmlhttp.send();
  }
}
