export function addScore(userID,gameID,score){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.write("Funge");
        }else{
            document.write("non funge");
        }
      };
    xhttp.open("GET", "AjaxCall.php?userID="+userID+"&gameID="+gameID+"&score="+score, true);
    xhttp.send();
}