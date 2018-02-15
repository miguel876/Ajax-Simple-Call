 //Select
 function showCountry(value){
    if(value==""){
      document.getElementById("setText").innerHTML="Empty Search";
      return;
    }else{
      if(window.XMLHttpRequest){
        http= new XMLHttpRequest();
      }else{
        document.getElementById("setText").innerHTML="Error!";
        return;
      }
      http.onreadystatechange= function(){
        if(this.readyState== 4 && this.status==200){
          document.getElementById("setText").innerHTML=this.responseText;
        }
      };
      http.open("GET","FutConn.php?src="+value,true);
      http.send();

    }
  }