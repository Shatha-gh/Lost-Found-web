function showme(){
    alert("ok");
}
function loginform(){
    email=document.getElementById("email").value;
    password=document.getElementById("password").value;
    var xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText=="success") {location.reload();}
    
    else {document.getElementById("msg").innerHTML="خطأ في تسجيل الدخول"}
    }
  }
  xmlhttp.open("POST","phpfiles/loginform.php",true);
  xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  xmlhttp.send("email="+email+"&password"+password);
    
}

function login(){
    name=document.getElementById("name").value;
    email=document.getElementById("email").value;
    password=document.getElementById("password").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText=="success") {location.reload();}
    else {document.getElementById("msg").innerHTML="خطأ في التسجيل"}
    }
  }
  xmlhttp.open("POST","phpfiles/login.php",true);
  xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  xmlhttp.send("name="+name+"&email="+email+"&password="+password);  
  
  }

function logout(){
    var xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText=="success") {location.reload();}
    }
  }
  xmlhttp.open("GET","phpfiles/logout.php",true);
  xmlhttp.send();

}

document.getElementById("display_code_side").addEventListener("click",function(){
    document.getElementById("code").style.display="block";
}); 
