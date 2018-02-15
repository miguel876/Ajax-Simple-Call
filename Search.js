 //Search
 function showTextSearch(valueSearch){
    if(valueSearch==""){
      document.getElementById("setTextSearch").innerHTML="Empty Search!";
      document.getElementById("setTextSearch").style.border="0px";
      return;
    }
    else{
      if(window.XMLHttpRequest){
        http=new XMLHttpRequest();
      }else{
        document.getElementById("setTextSearch").innerHTML="Error1!";
        return;
      }
      http.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
          document.getElementById("setTextSearch").innerHTML=this.responseText;
          document.getElementById("setTextSearch").style.border="1px solid black";
        }
      };
      http.open("GET","FutConn.php?val="+valueSearch,true);
      http.send();
    }
  }